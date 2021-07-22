<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;
use App\Models\Mail;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stat['mails_count'] = Mail::count();
        $stat['mails_in_count'] = Mail::where('type', 'IN')->count();
        $stat['mails_out_count'] = $stat['mails_count'] - $stat['mails_in_count'];

        $stat['mails_ongoing_count'] = Mail::whereNull('archived_at')->count();
        $stat['mails_archived_count'] = $stat['mails_count'] - $stat['mails_ongoing_count'];

        return view('dashboard.administration', compact('stat'));
    }
}
