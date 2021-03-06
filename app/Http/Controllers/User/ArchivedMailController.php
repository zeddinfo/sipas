<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\ArchivedMailDataTable;

class ArchivedMailController extends Controller
{
    public function index(ArchivedMailDataTable $dataTable)
    {
        $title = 'Terarsip';
        $icon = 'bi-archive';
        $table_view = 'mails/tables/archived';
        return $dataTable->render('mails.index', compact('title', 'icon', 'table_view'));
    }
}
