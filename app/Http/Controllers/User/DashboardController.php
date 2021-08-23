<?php

namespace App\Http\Controllers\User;

use App\Models\Mail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $stat['mails_count'] = Mail::whereNull('archived_at')->whereHas('versions.mailTransactions', function ($query) {
            $query->where('user_id', Auth::user()->getSameUser()->id)->orWhere('target_user_id', Auth::user()->getSameUser()->id);
        })->count();

        $stat['mails_in_count'] = Mail::whereNull('archived_at')->where('type', 'IN')->whereHas('versions.mailTransactions', function ($query) {
            $query->where('user_id', Auth::user()->getSameUser()->id)->orWhere('target_user_id', Auth::user()->getSameUser()->id);
        })->count();

        $stat['mails_out_count'] = $stat['mails_count'] - $stat['mails_in_count'];

        return view('dashboard.user', compact('stat'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
