<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Utilities\RouteHelper;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\DataTables\OngoingMailDataTable;

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
