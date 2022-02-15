<?php

namespace App\Http\Controllers;

use App\Jobs\ExtractText;
use App\Models\Document;
use App\Services\UploadService;
use Illuminate\Http\Request;

class DocumentController extends Controller
{

    public function __construct()
    {
    }

    public function upload(Request $request)
    {
        return view('document.upload');
    }

    public function processUpload(Request $request, UploadService $uploadService)
    {
        foreach ($request->file() as $key => $file) {

            if (!in_array($key, ['driving_license'])) {
                continue;
            }

            $path = $uploadService->upload($file, 'public' . DIRECTORY_SEPARATOR . 'uploads');
            $document = new Document();
            $document->document_path = $path;
            $document->is_parsed = false;
            $document->document_type = $key;
            $document->save();
            ExtractText::dispatch($document);
        }

        return redirect(route('app.uploadDocuments'))->with('success', 'Application successfully submitted');
    }
}
