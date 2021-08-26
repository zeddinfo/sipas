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
        $title = 'Terarsip';
        $icon = 'bi-pen';
        $table_view = "mails.tables.archived";
        return $dataTable->render('mails.index', compact('title', 'icon', 'table_view'));
    }
}
