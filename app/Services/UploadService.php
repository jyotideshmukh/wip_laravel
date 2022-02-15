<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UploadService
{
    public function __construct()
    {
    }

    private function getName($file)
    {
        return Str::slug(preg_replace('/\s+/', '_', $file->getClientOriginalName())) . '-' . time() . '.' . $file->getClientOriginalExtension();
    }

    private function getDisk()
    {
        return  config('custom.upload.disk', 'local');
    }

    public function upload($file, $uploadPath)
    {
        $name = $this->getName($file);
        $path = $uploadPath . DIRECTORY_SEPARATOR . $name;

        $disk = $this->getDisk();
        Storage::disk($disk)->put($path, file_get_contents($file));

        return $path;
    }
}
