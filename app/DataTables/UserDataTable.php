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
        $users = User::select('users.*');
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
            ->dom('Bfrtip')
            ->buttons(
                Button::make('export'),
                Button::make('pageLength'),
            )
            ->parameters([
                'buttons' => [
                    'buttons' => [
                        [
                            'extend' => 'export',
                            'className' => 'btn-warning'
                        ],
                        [
                            'extend' => 'pageLength',
                            'className' => 'btn-warning'
                        ],
                    ]
                ],
                'language' => [
                    'emptyTable' => 'Tidak ada data',
                    'infoEmpty' => 'Tidak ada data',
                    'info' => 'Menampilkan data dari _START_ sampai _END_ dari _TOTAL_ data',
                    'buttons' => [
                        'pageLength' => [
                            '_' => 'Lihat %d data',
                        ]
                    ],
                    'processing' => 'Sedang memproses ...',
                    'loadingRecords' => 'Sedang memproses ...',
                    'zeroRecords' => 'Data tidak ditemukan',
                    'search' => 'Cari:',
                    'paginate' => [
                        'first' => 'Pertama',
                        'last' => 'Terakhir',
                        'next' => 'Selanjutnya',
                        'previous' => 'Sebelumnya',
                    ],

                ]
            ]);
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
            Column::make('nip')
                ->name('users.nip')
                ->title('NIP'),
            Column::make('email')
                ->name('users.email')
                ->title('Email'),
            Column::make('phone_number')
                ->name('user.phone_number')
                ->title('Nomor HP'),
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
