<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MailAttributeRequest;
use App\Models\MailAttribute;
use Illuminate\Http\Request;

class MailAtrributeSettingController extends Controller
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
    public function store(MailAttributeRequest $request)
    {
        MailAttribute::create($request->validated());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MailAttribute  $mail_attribute
     * @return \Illuminate\Http\Response
     */
    public function show(MailAttribute $mail_attribute)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MailAttribute  $mail_attribute
     * @return \Illuminate\Http\Response
     */
    public function edit(MailAttribute $mail_attribute)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MailAttribute  $mail_attribute
     * @return \Illuminate\Http\Response
     */
    public function update(MailAttributeRequest $request, MailAttribute $mail_attribute)
    {
        $mail_attribute->update($request->validated());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MailAttribute  $mail_attribute
     * @return \Illuminate\Http\Response
     */
    public function destroy(MailAttribute $mail_attribute)
    {
        $mail_attribute->delete();
    }
}
