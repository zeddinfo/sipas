<?php

namespace App\Http\Controllers;

use App\Utilities\SendEmailHelper;
use Illuminate\Http\Request;

class EmailNotificationsController extends Controller
{
    public function sendEmail(Request $request)
    {
        $data = "Hello";
        $title =
            $action = SendEmailHelper::sendEmail($data, "Sistem Pengarsipan Surat - Pemberitahuan", "Surat Masuk", "Tanggapan Anda");
        if ($action) {
            return 'Berhasil kirim email';
        } else {
            abort(404);
        }
    }
}
