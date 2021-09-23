<?php

namespace App\Http\Controllers\Administration;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\ArchivedMailDataTable;
use App\DataTables\OngoingMailDataTable;
use App\Utilities\RouteHelper;
use Illuminate\Support\Facades\Session;

class OngoingMailController extends Controller
{
    public function index(OngoingMailDataTable $dataTable)
    {
        $title = 'Sedang Berlangsung';
        $icon = 'bi-arrow-clockwise';
        $table_view = "mails.tables.on-going";

        Session::put('page', route(RouteHelper::get('mail.ongoing.index')));
        return $dataTable->render('mails.index', compact('title', 'icon', 'table_view'));
    }
}
