<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait ImageUploadTrait
{
    public function uploadImage($request, $inputName, $folder = 'images')
    {
        // Validate the uploaded file
        $request->validate([
            $inputName => 'image|mimes:jpeg,png,jpg,webp|max:2048', 
        ]);
        
        // Check if the request has the file
        if ($request->hasFile($inputName)) {
            $file = $request->file($inputName);
            
            // Generate a unique file name
            $fileName = time() . '_' . '.' . $file->getClientOriginalExtension();

            // Move the file to the custom folder
            $path = $file->move(public_path($folder), $fileName);

            $fullPath = $folder . '/' . $fileName;
            return $fullPath;
        }

        return null;
    }
}
