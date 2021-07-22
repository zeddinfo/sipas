<?php

namespace App\Http\Controllers\Admin;

use App\Models\Mail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MailTransaction;
use App\Models\User;
use App\Repositories\UsersMailRepository;

class DashboardController extends Controller
{
    public function index()
    {
        $stat['users_count'] = User::count();
        $stat['mails_count'] = Mail::count();
        $stat['transactions_count'] = MailTransaction::count();

        return view('dashboard.admin', compact('stat'));
    }
}
