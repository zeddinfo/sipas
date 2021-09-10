<?php

namespace App\DataTables;

use App\Models\Level;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class LevelDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->editColumn('name', function ($level) {
                return "<b>$level->name</b>";
            })
            ->editColumn('sameLevel.name', function ($level) {
                return $level->sameLevel != null ? $level->sameLevel->name : '';
            })
            ->addColumn('action', function ($level) {
                if ($level->name == 'Admin' || $level->name == 'TU') {
                    return '';
                }
                return view('setting.levels.action', compact('level'));
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
        $levels = Level::with('sameLevel')
            ->select('levels.*');
        return $levels->newQuery();
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
                Button::make('reset', 'asdf'),
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
                ->title('Jabatan'),
            Column::make('sameLevel.name')
                ->name('levels.name')
                ->title('Setara Dengan Jabatan'),
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
        return 'Levels_' . date('YmdHis');
    }
}
