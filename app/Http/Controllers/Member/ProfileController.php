<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Member;
use Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Throwable;

class ProfileController extends Controller
{
    public function show(): Renderable
    {
        $country = Country::whereName('India')->first();

        return view('member.profile.show', [
            'member' => Auth::user()->member,
            'countries' => Country::get(),
        ]);
    }

    /**
     * @throws ValidationException
     */
    public function update(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'dob' => Rule::requiredIf(function () use ($request) {
                return $request->get('dob');
            }),
        ], [
            'country_id.required' => 'The country is required.',
            'mobile.required' => 'The mobile number is required.',
            'mobile.numeric' => 'The mobile number must be a number',
            'email.required' => 'The Email ID is required',
            'email.email' => 'The Email ID must be a valid format',
        ]);

        try {
            return DB::transaction(function () use ($request) {
                $this->user->country_id = $request->country_id;
                if ($request->input('dob')) {
                    $date = Carbon::parse(trim($request->dob));
                    $this->user->dob = $date;
                } else {
                    $this->user->dob = null;
                }

                $this->user->save();

                if ($image = $request->input('profile_image')) {
                    $this->member->addMediaFromDisk($image)
                        ->toMediaCollection(Member::MC_PROFILE_IMAGE);
                } else {
                    if ($oldProfileImage = $this->member->media()->where('collection_name', 'profile_image')->first()) {
                        $this->member->deleteMedia($oldProfileImage->id);
                    }
                }

                return redirect()->back()->with(['success' => 'Profile updated successfully']);
            });
        } catch (Throwable $e) {
            return $this->logExceptionAndRespond($e);
        }

    }
}
