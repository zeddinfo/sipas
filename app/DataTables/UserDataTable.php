<?php

namespace App\DataTables;

use App\Models\Mail;
use App\Models\User;
use Illuminate\Support\Str;
use App\Utilities\RouteHelper;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class UserDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->editColumn('name', function ($user) {
                return "<b>$user->name</b>";
            })
            ->editColumn('department.name', function ($user) {
                return $user->department != null ? $user->department->name : '';
            })
            ->addColumn('action', function ($user) {
                return view('setting.users.action', compact('user'));
            })
            ->rawColumns(['name', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\AllMailDataTable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $users = User::with('level', 'department')
            ->select('users.*');
        return $users->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('allmaildatatable-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->parameters([
                'language' => [
                    'emptyTable' => 'Tidak ada data',
                    'info' => 'Menampilkan data dari _START_ sampai _END_ dari _TOTAL_ data',
                    'processing' => 'Sedang memproses ...',
                    'loadingRecords' => 'Sedang memproses ...',
                    'zeroRecords' => 'Data tidak ditemukan',
                    'search' => 'Cari:',
                    'paginate' => [
                        'first' => 'Pertama',
                        'last' => 'Terakhir',
                        'next' => 'Selanjutnya',
                        'previous' => 'Sebelumnya',
                    ]
                ]
            ])
            ->dom('lfrtip');
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('id')
                ->name('users.id')
                ->title('ID'),
            Column::make('name')
                ->name('users.name')
                ->title('Nama'),
            Column::make('email')
                ->name('users.email')
                ->title('Email'),
            Column::make('level.name')
                ->name('level.name')
                ->title('Jabatan'),
            Column::make('department.name')
                ->name('department.name')
                ->title('Sub-Bagian/Bidang/Seksie'),
            Column::make('action')
                ->title('Aksi')
                ->orderable(false)
                ->searchable(false)
                ->printable(false)
                ->exportable(false),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Users_' . date('YmdHis');
    }
}
