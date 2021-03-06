<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\MailAttributeDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\MailAttributeRequest;
use App\Models\MailAttribute;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MailAtrributeSettingController extends Controller
{
    public function index(MailAttributeDataTable $dataTable)
    {
        $title = 'Data Atribut Surat';
        $icon = 'bi-file-earmark-medical';
        $table_view = "setting.mail-attributes.index";
        return $dataTable->render('setting.index', compact('title', 'icon', 'table_view'));
    }

    public function create()
    {
        $mail_attribute_types = MailAttribute::select('type')->distinct()->get();

        return view('setting.mail-attributes.create', compact('mail_attribute_types'));
    }

    public function store(MailAttributeRequest $request)
    {
        MailAttribute::create($request->validated());

        Alert::success('Yeay :D', "Berhasil menambahkan atribut surat");
        return redirect(route('admin.setting.mail.attribute.index'));
    }

    public function show(MailAttribute $mail_attribute)
    {
    }

    public function edit(MailAttribute $mail_attribute)
    {
        $mail_attribute_types = MailAttribute::select('type')->distinct()->get();
        return view('setting.mail-attributes.edit', compact('mail_attribute', 'mail_attribute_types'));
    }

    public function update(MailAttributeRequest $request, MailAttribute $mail_attribute)
    {
        $mail_attribute->update($request->validated());

        Alert::success('Yeay :D', "Berhasil mengubah atribut surat");
        return redirect(route('admin.setting.mail.attribute.edit', $mail_attribute));
    }

    public function destroy(MailAttribute $mail_attribute)
    {
        $mail_attribute->delete();

        Alert::success('Yeay :D', "Berhasil menghapus atribut surat");
        return redirect(route('admin.setting.mail.attribute.index'));
    }
}
