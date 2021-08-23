<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\ArchivedMailDataTable;

class ArchivedMailController extends Controller
{
    public function index(ArchivedMailDataTable $dataTable)
    {
        $page = 'Terarsip';
        $icon = 'bi-pen';
        return $dataTable->render('mails.index', compact('page', 'icon'));
    }
}
