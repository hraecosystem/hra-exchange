<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LegalDocument;
use DB;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Throwable;

class LegalDocumentController extends Controller
{
    /**
     * @throws Throwable
     */
    public function store(Request $request): mixed
    {
        $this->validate($request, [
            'image' => 'required',
            'name' => 'max:100',
        ], [
            'name.max' => 'The Document name must not be greater than 100 characters',
        ]);

        try {
            return DB::transaction(function () use ($request) {
                $legalDocument = LegalDocument::create([
                    'name' => $request->get('name'),
                    'status' => LegalDocument::STATUS_ACTIVE,
                ]);

                if ($fileName = $request->get('image')) {
                    $filePath = 'tmp/'.Str::beforeLast($fileName, '.');

                    $legalDocument->addMediaFromDisk($filePath)
                        ->usingFileName($fileName)
                        ->toMediaCollection(LegalDocument::MC_LEGAL_DOCUMENTS);
                }

                return redirect()->back()->with(['success' => 'Legal document added successfully']);
            });
        } catch (Throwable $e) {
            return redirect()->back()->with(['error' => 'Something went wrong. Please try again']);
        }
    }

    public function create(): Renderable
    {
        return view('admin.legal.create', [
            'legalDocuments' => LegalDocument::with('media')->get(),
        ]);
    }

    /**
     * @throws Throwable
     */
    public function update(LegalDocument $legalDocument, Request $request): mixed
    {
        $this->validate($request, [
            'legalDocumentStatuses.*' => 'required|in:'.implode(',', [
                LegalDocument::STATUS_ACTIVE, LegalDocument::STATUS_INACTIVE,
            ]
            ),
            'images.*' => 'required',
            'documentNames.*' => 'max:100',
        ], [
            'images.*.required' => 'The image is required',
            'documentNames.*.max' => 'The Document name must not be greater than 100 characters',
        ]);
        $key = current(array_keys($request->get('documentNames')));

        try {
            return DB::transaction(function () use ($key, $request, $legalDocument) {
                $legalDocument->update([
                    'name' => $request->get('documentNames')[$key],
                    'status' => $request->get('legalDocumentStatuses')[$key],
                ]);

                if ($fileName = $request->get('images')[$key]) {
                    $filePath = 'tmp/'.Str::beforeLast($fileName, '.');

                    $legalDocument->addMediaFromDisk($filePath)
                        ->usingFileName($fileName)
                        ->toMediaCollection(LegalDocument::MC_LEGAL_DOCUMENTS);
                }

                return redirect()->back()->with(['success' => 'Legal document updated successfully']);
            });
        } catch (Throwable $e) {
            return redirect()->back()->with(['error' => 'Something went wrong. Please try again']);
        }
    }

    /**
     * @throws Throwable
     */
    public function destroy(LegalDocument $legalDocument): mixed
    {
        try {
            return DB::transaction(function () use ($legalDocument) {
                $legalDocument->delete();

                return redirect()->back()->with(['success' => 'Legal document deleted successfully']);
            });
        } catch (Throwable $e) {
            return redirect()->back()->with(['error' => 'Something went wrong. Please try again']);
        }
    }
}
