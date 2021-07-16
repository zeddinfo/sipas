<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MailAttributeRequest;
use App\Models\MailAttribute;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MailAtrributeSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = 'Atribut Surat';
        $mail_attributes = MailAttribute::all();
        return view('setting.mail-attributes.index', compact('mail_attributes', 'page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mail_attribute_types = MailAttribute::select('type')->distinct()->get();
        return view('setting.mail-attributes.create', compact('mail_attribute_types'));
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

        Alert::success('Yeay :D', "Berhasil menambahkan atribut surat");
        return redirect(route('admin.setting.mail.attribute.index'));
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
        $mail_attribute_types = MailAttribute::select('type')->distinct()->get();
        return view('setting.mail-attributes.edit', compact('mail_attribute', 'mail_attribute_types'));
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

        Alert::success('Yeay :D', "Berhasil mengubah atribut surat");
        return redirect(route('admin.setting.mail.attribute.edit', $mail_attribute));
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

        Alert::success('Yeay :D', "Berhasil menghapus atribut surat");
        return redirect(route('admin.setting.mail.attribute.index'));
    }
}
