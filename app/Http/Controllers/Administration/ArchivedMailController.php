<?php

namespace App\Http\Controllers\Administration;

use App\Models\Mail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\DataTables\ArchivedMailDataTable;

class ArchivedMailController extends Controller
{
    public function index(ArchivedMailDataTable $dataTable)
    {
        $page = 'Terarsip';
        $icon = 'bi-pen';
        return $dataTable->render('mails.index', compact('page', 'icon'));
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
