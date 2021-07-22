<?php

namespace App\Services;

use App\Models\File;

class FileServices
{
    const TYPE_IMAGE = "IMAGE";
    const TYPE_DOCUMENT = "DOCUMENT";

    static $image_extensions = ['img', 'jpg', 'jpeg', 'png'];
    static $document_extensions = ['pdf', 'doc', 'docx'];

    public static function extensionAdapter(File $file)
    {
        $file_url = url('storage/' . $file->directory_name);
        switch (FileServices::getFileType($file->original_name)) {
            case FileServices::TYPE_IMAGE:
                return $file_url;
                break;

            case FileServices::TYPE_DOCUMENT:
                return "https://docs.google.com/viewer?url=" . $file_url;
                break;

            default:
                break;
        }
    }

    public static function getFileType($filename)
    {
        foreach (FileServices::$image_extensions as $image_extension) {
            if (str_contains($filename, $image_extension)) {
                return FileServices::TYPE_IMAGE;
            }
        }

        foreach (FileServices::$document_extensions as $document_extension) {
            if (str_contains($filename, $document_extension)) {
                return FileServices::TYPE_DOCUMENT;
            }
        }
    }
}
