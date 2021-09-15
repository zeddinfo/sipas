<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Utilities\RouteHelper;
use App\Http\Controllers\Controller;
use App\DataTables\OngoingMailDataTable;

class OngoingMailController extends Controller
{
    public function index(OngoingMailDataTable $dataTable)
    {
        $title = 'Sedang Berlangsung';
        $icon = 'bi-arrow-clockwise';
        $table_view = "mails.tables.on-going";

        $cookie = cookie('page', route(RouteHelper::get('mail.ongoing.index')), 90);
        return $dataTable->render('mails.index', compact('title', 'icon', 'table_view'))->cookie($cookie);
    }
}
