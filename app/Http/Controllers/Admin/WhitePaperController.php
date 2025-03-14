<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WhitePaper;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

class WhitePaperController extends Controller
{
    /**
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     * @throws ValidationException
     */
    public function show(Request $request): RedirectResponse|Renderable
    {
        $whitePaper = WhitePaper::first();

        if ($request->isMethod('post')) {

            $rules['status'] = 'required';

            $this->validate($request, $rules);

            if (isset($whitePaper)) {
                $whitePaper->status = $request->status;
                $whitePaper->save();
            } else {

                $whitePaper = WhitePaper::create([
                    'status' => $request->status,
                ]);
            }

            if ($fileName = $request->get('white_paper')) {
                $filePath = 'tmp/'.Str::beforeLast($fileName, '.');

                $whitePaper->addMediaFromDisk($filePath)
                    ->usingFileName($fileName)
                    ->toMediaCollection(WhitePaper::MC_WHITE_PAPER);
            }

            return redirect()->route('admin.white-paper.show')
                ->with(['success' => 'White Paper updated successfully']);
        }

        return view('admin.white-paper.show', ['whitePaper' => $whitePaper]);
    }
}
