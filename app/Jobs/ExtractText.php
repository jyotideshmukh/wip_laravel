<?php

namespace App\Jobs;

use App\Models\Document;
use App\Services\OcrService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use OCR;


class ExtractText implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    protected $document;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Document $document)
    {
        $this->document = $document;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(OcrService $ocrService)
    {
        $text = $ocrService->extract('storage/app/' . $this->document->document_path);
        $dlNo = $ocrService->dlNo($text);
        $expiry = $ocrService->expiry($text);
        $lastName = $ocrService->lastName($text);
        $firstName = $ocrService->firstName($text);
        $address = $ocrService->address($text);
        $dob = $ocrService->dob($text);

        $this->document->parsed_content = $text;
        $this->document->parsed_license_no = $dlNo;
        $this->document->parsed_license_expiry_date = $expiry;
        $this->document->parsed_first_name = $firstName;
        $this->document->parsed_last_name = $lastName;
        $this->document->parsed_address = $address;
        $this->document->save();
    }
}
