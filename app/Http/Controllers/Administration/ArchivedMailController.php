<?php

namespace App\Http\Controllers\Administration;

use App\Utilities\RouteHelper;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\DataTables\ArchivedMailDataTable;

class ArchivedMailController extends Controller
{
    public function index(ArchivedMailDataTable $dataTable)
    {
        $title = 'Terarsip';
        $icon = 'bi-archive';
        $table_view = "mails.tables.archived";
        Session::put('page', route(RouteHelper::get('mail.archived.index')));
        return $dataTable->render('mails.index', compact('title', 'icon', 'table_view'));
    }
}
