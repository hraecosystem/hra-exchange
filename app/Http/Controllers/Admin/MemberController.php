<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\ListBuilders\Admin\MemberListBuilder;
use App\ListBuilders\Admin\MemberStatusLogListBuilder;
use App\Models\Member;
use App\Models\User;
use Brick\Math\Exception\MathException;
use Brick\Math\Exception\RoundingNecessaryException;
use Carbon\Carbon;
use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;

class MemberController extends Controller
{
    /**
     * @throws Exception
     */
    public function index(): Renderable|JsonResponse|RedirectResponse
    {
        MemberListBuilder::$name = Str::plural(settings('member_name'));

        return MemberListBuilder::render();
    }

    public function show(Member $member): Member
    {
        return $member->load('user');
    }

    /**
     * @throws RoundingNecessaryException
     * @throws MathException
     */
    public function detail($code): JsonResponse
    {
        $member = Member::whereCode($code)->first();
        if ($member) {
            return response()->json([
                'status' => true,
                'name' => $member->user->name,
                'euro_wallet_balance' => toHumanReadable($member->euro_wallet_balance),
                'coin_wallet_balance' => toHumanReadable($member->coin_wallet_balance),
            ]);
        } else {
            return response()->json([
                'status' => false,
            ], 404);
        }
    }

    public function edit(Member $member): Renderable
    {
        return view('admin.members.edit', ['member' => $member]);
    }

    /**
     * @throws ValidationException
     */
    public function update(Request $request, Member $member): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => [
                'required',
                'email:rfc,dns',
            ],
            'mobile' => 'nullable|numeric',
            'gender' => 'in:'.implode(',', [User::GENDER_MALE, User::GENDER_FEMALE]),
            'dob' => Rule::requiredIf(function () use ($request) {
                return $request->get('dob');
            }),
        ], [
            'name.required' => 'The name is required',
            'mobile.required' => 'The mobile number is required',
            'mobile.numeric' => 'The mobile number must be a number',
            'email.email' => 'The Email ID must be a valid format',
        ]);

        if (User::whereEmail($request->input('email'))->where('id', '!=', $member->user_id)->exists()) {
            return redirect()->back()->with(['error' => 'The Email ID has already in use']);
        }

        $member->user->name = ucwords($request->get('name'));
        $member->user->email = $request->get('email');
        $member->user->mobile = $request->get('mobile');
        $member->user->gender = $request->get('gender');
        if ($request->get('dob')) {
            $member->user->dob = Carbon::parse(trim($request->get('dob')));
        } else {
            $member->user->dob = null;
        }

        $member->user->save();

        return redirect()->route('admin.members.index')->with(['success' => 'Member details updated successfully']);
    }

    /**
     * @throws Exception
     */
    public function memberLog(Request $request, Member $member): Renderable|JsonResponse|RedirectResponse
    {
        return MemberStatusLogListBuilder::render([
            'member_id' => $this->member->id,
        ]);
    }
}
