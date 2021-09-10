<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\OngoingMailDataTable;

class OngoingMailController extends Controller
{
    public function index(OngoingMailDataTable $dataTable)
    {
        $title = 'Sedang Berlangsung';
        $icon = 'bi-arrow-clockwise';
        $table_view = "mails.tables.on-going";
        return $dataTable->render('mails.index', compact('title', 'icon', 'table_view'));
    }
}
