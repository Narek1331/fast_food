<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

class FileUploadService
{
    /**
     * Upload an image file.
     *
     * @param \Illuminate\Http\UploadedFile $file The file to upload
     * @param string $directory The directory to upload the file to (optional)
     * @return string The path to the stored file
     */
    public function uploadImage(UploadedFile $file, $directory = 'images')
    {
        $directory = '/public' .'/'.  $directory ;
        // Generate a unique filename for the image
        $filename = uniqid() . '_' . time() . '.' . $file->getClientOriginalExtension();

        // Store the file in the specified directory within the storage
        $path = $file->storeAs($directory, $filename);

        // Return the path to the stored file
        return str_replace("public", "/storage", $path);
    }

    /**
     * Delete an image file.
     *
     * @param string $path The path to the image file to delete
     * @return void
     */
    public function deleteImage($path)
    {
        // Delete the image file from storage
        Storage::delete(str_replace("/storage", "public", $path));
    }
}
