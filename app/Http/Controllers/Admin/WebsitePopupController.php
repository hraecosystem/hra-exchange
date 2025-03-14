<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WebsitePopup;
use DB;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Throwable;

class WebsitePopupController extends Controller
{
    public function create(): Factory|View
    {
        return view('admin.website-popup.show', [
            'popups' => WebsitePopup::with('media')->get(),
        ]);
    }

    /**
     * @return RedirectResponse|mixed
     *
     * @throws ValidationException
     * @throws Throwable
     */
    public function store(Request $request): mixed
    {
        $this->validate($request, [
            'image' => 'required',
            'name' => 'required|max:255',
        ], [
            'name.required' => 'The popup name is required',
            'name.max' => 'The name must not be greater than 255 characters',
        ]);

        try {
            return DB::transaction(function () use ($request) {
                $popup = WebsitePopup::create([
                    'name' => $request->get('name'),
                    'status' => WebsitePopup::STATUS_ACTIVE,
                ]);

                $fileName = $request->get('image');
                $filePath = 'tmp/'.Str::beforeLast($fileName, '.');

                $popup->addMediaFromDisk($filePath)
                    ->usingFileName($fileName)
                    ->toMediaCollection(WebsitePopup::MEDIA_COLLECTION_IMAGE_WEBSITE_POPUP);

                return redirect()->back()->with(['success' => 'Website popup added successfully']);
            });
        } catch (Throwable $e) {
            return redirect()->back()->with(['error' => 'Something went wrong. Please try again']);
        }
    }

    /**
     * @return RedirectResponse|mixed
     *
     * @throws ValidationException
     */
    public function update(WebsitePopup $popup, Request $request): mixed
    {
        $this->validate($request, [
            'images.*' => 'required',
            'popupNames.*' => 'required',
            'popupStatuses.*' => 'required|in:'.implode(',', [WebsitePopup::STATUS_ACTIVE, WebsitePopup::STATUS_INACTIVE]),
        ], [
            'popupNames.*.required' => 'The popup name is required',
        ]);
        try {
            return DB::transaction(function () use ($request, $popup) {

                if ($request->popupNames) {
                    foreach ($request->popupNames as $index => $popupName) {
                        $popup->name = $popupName;
                        $popup->save();
                    }
                }

                if ($request->popupStatuses) {
                    foreach ($request->popupStatuses as $index => $popupStatus) {
                        $popup->status = $popupStatus;
                        $popup->save();
                    }
                }

                foreach ($request->images as $key => $image) {
                    if ($fileName = $image) {
                        $filePath = 'tmp/'.Str::beforeLast($fileName, '.');

                        $popup->addMediaFromDisk($filePath)
                            ->usingFileName($fileName)
                            ->toMediaCollection(WebsitePopup::MEDIA_COLLECTION_IMAGE_WEBSITE_POPUP);
                    }
                }

                return redirect()->back()->with(['success' => 'Website popup updated successfully']);
            });
        } catch (Throwable $e) {
            return redirect()->back()->with(['error' => 'Something went wrong. Please try again']);
        }
    }

    /**
     * @return RedirectResponse
     */
    public function destroy(WebsitePopup $popup): mixed
    {
        try {
            return DB::transaction(function () use ($popup) {
                $popup->delete();

                return redirect()->back()->with(['success' => 'Website popup deleted successfully']);
            });
        } catch (Throwable $e) {
            return redirect()->back()->with(['error' => 'Something went wrong. Please try again']);
        }
    }
}
