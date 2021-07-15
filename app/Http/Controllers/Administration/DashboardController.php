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
