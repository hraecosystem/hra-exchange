<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use DB;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Throwable;

class WebsiteBannerController extends Controller
{
    public function create(): Factory|View
    {
        return view('admin.website-banner.create', [
            'banners' => Banner::with('media')->get(),
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
            'name' => 'max:100',
        ], [
            'name.max' => 'The Banner name must not be greater than 100 characters',
        ]);

        try {
            return DB::transaction(function () use ($request) {
                $banner = Banner::create([
                    'name' => $request->get('name'),
                    'status' => Banner::STATUS_ACTIVE,
                ]);

                if ($fileName = $request->get('image')) {
                    $filePath = 'tmp/'.Str::beforeLast($fileName, '.');

                    $banner->addMediaFromDisk($filePath)
                        ->usingFileName($fileName)
                        ->toMediaCollection(Banner::MC_BANNER);
                }

                return redirect()->back()->with(['success' => 'Banner added successfully']);
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
    public function update(Banner $banner, Request $request): mixed
    {
        $this->validate($request, [
            'images.*' => 'required',
            'bannerNames.*' => 'max:100',
            'bannerStatuses.*' => 'required|in:'.implode(',', [Banner::STATUS_ACTIVE, Banner::STATUS_INACTIVE]),
        ], [
            'bannerNames.max' => 'The Banner name must not be greater than 100 characters',
        ]);
        try {
            return DB::transaction(function () use ($request, $banner) {

                if ($request->bannerNames) {
                    foreach ($request->bannerNames as $index => $bannerName) {
                        $banner->name = $bannerName;
                        $banner->save();
                    }
                }

                if ($request->bannerStatuses) {
                    foreach ($request->bannerStatuses as $index => $bannerStatus) {
                        $banner->status = $bannerStatus;
                        $banner->save();
                    }
                }

                foreach ($request->images as $key => $image) {
                    if ($fileName = $image) {
                        $filePath = 'tmp/'.Str::beforeLast($fileName, '.');

                        $banner->addMediaFromDisk($filePath)
                            ->usingFileName($fileName)
                            ->toMediaCollection(Banner::MC_BANNER);
                    }
                }

                return redirect()->back()->with(['success' => 'Banner updated successfully']);
            });
        } catch (Throwable $e) {
            return redirect()->back()->with(['error' => 'Something went wrong. Please try again']);
        }
    }

    public function destroy(Banner $banner): mixed
    {
        try {
            return DB::transaction(function () use ($banner) {
                $banner->delete();

                return redirect()->back()->with(['success' => 'Banner deleted successfully']);
            });
        } catch (Throwable $e) {
            return redirect()->back()->with(['error' => 'Something went wrong. Please try again']);
        }
    }
}
