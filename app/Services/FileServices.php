<?php

namespace App\Services;

use App\Models\File;
use Illuminate\Support\Facades\Storage;

class FileServices
{
    const TYPE_IMAGE = "IMAGE";
    const TYPE_PDF = "PDF";
    const TYPE_DOC = "DOC";

    static $image_extensions = ['img', 'jpg', 'jpeg', 'png'];
    static $pdf_extensions = ['pdf'];
    static $doc_extensions = ['doc', 'docx'];

    public static function extensionAdapter(File $file)
    {
        $file_url = Storage::url( $file->directory_name);
        switch (FileServices::getFileType($file->original_name)) {
            case FileServices::TYPE_IMAGE:
                return $file_url;
                break;

            case FileServices::TYPE_PDF:
                return  $file_url;
                break;

            case FileServices::TYPE_DOC:
                return $file_url;
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

        foreach (FileServices::$pdf_extensions as $pdf_extension) {
            if (str_contains($filename, $pdf_extension)) {
                return FileServices::TYPE_PDF;
            }
        }

        foreach (FileServices::$doc_extensions as $doc_extension) {
            if (str_contains($filename, $doc_extension)) {
                return FileServices::TYPE_DOC;
            }
        }
    }
}
