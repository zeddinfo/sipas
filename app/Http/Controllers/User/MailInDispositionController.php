<?php

namespace App\Http\Controllers\User;

use App\Events\DispositionMailIn;
use App\Http\Controllers\Controller;
use App\Http\Requests\DispositionRequest;
use App\Models\Mail;
use App\Models\MailTransactionMemo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MailInDispositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Mail $mail)
    {
        // dd('sdfs');
        if (!User::hasDispostion()) {
            abort(404);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Mail $mail)
    {

        $user_ids = $request->user_ids;

        $lower_users = Auth::user()->getLowerUsers('in')->pluck('id');
        // dd($lower_users);

        foreach ($request->user_ids as $user_id) {
            if (!in_array($user_id, $lower_users->toArray())) {
                dd('miss');
            } else {
                // dd('masuk');
                event(new DispositionMailIn($mail, request()));
            }
        }
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
