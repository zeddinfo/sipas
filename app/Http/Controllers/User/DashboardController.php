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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
