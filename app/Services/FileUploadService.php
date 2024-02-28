<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

class FileUploadService
{
    public function uploadImage(UploadedFile $file, $directory = 'images')
    {
        $directory = '/public' .'/'.  $directory ;
        // Generate a unique filename for the image
        $filename = uniqid() . '_' . time() . '.' . $file->getClientOriginalExtension();

        // Store the file in the specified directory within the storage
        $path = $file->storeAs($directory, $filename);

        // Return the path to the stored file
        return $path;
    }

    public function deleteImage($path)
    {
        // Delete the image file from storage
        Storage::delete($path);
    }
}
