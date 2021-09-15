<?php

namespace App\Http\Controllers\Administration;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\ArchivedMailDataTable;
use App\DataTables\OngoingMailDataTable;
use App\Utilities\RouteHelper;

class OngoingMailController extends Controller
{
    public function index(OngoingMailDataTable $dataTable)
    {
        $title = 'Sedang Berlangsung';
        $icon = 'bi-arrow-clockwise';
        $table_view = "mails.tables.on-going";

        $cookie = cookie('page', route(RouteHelper::get('mail.ongoing.index')), 90);
        return $dataTable->render('mails.index', compact('title', 'icon', 'table_view'))->withCookie($cookie);
    }
}
