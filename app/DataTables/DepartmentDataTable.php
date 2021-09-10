<?php

namespace App\DataTables;

use App\Models\Deparment;
use App\Models\Department;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class DepartmentDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->editColumn('name', function ($department) {
                return "<b>$department->name</b>";
            })
            ->editColumn('upperDepartment.name', function ($department) {
                return $department->upperDepartment != null ? $department->upperDepartment->name : '';
            })
            ->addColumn('action', function ($department) {
                return view('setting.departments.action', compact('department'));
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
        $departments = Department::with('upperDepartment')
            ->select('departments.*');
        return $departments->newQuery();
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
            ->dom('lfrtip')
            ->buttons(
                Button::make('export'),
                Button::make('print'),
                Button::make('reset'),
            )
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
                ->title('ID'),
            Column::make('name')
                ->name('name')
                ->title('Departemen'),
            Column::make('upperDepartment.name')
                ->name('departments.name')
                ->title('Sub Dari Departemen'),
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
        return 'Deparment_' . date('YmdHis');
    }
}
