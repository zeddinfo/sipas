<?php

namespace App\DataTables;

use App\Models\Level;
use App\Models\MailAttribute;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class MailAttributeDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->editColumn('name', function ($mail_attribute) {
                return "<b>$mail_attribute->name</b>";
            })
            ->editColumn('sameLevel.name', function ($mail_attribute) {
                return $mail_attribute->sameLevel != null ? $mail_attribute->sameLevel->name : '';
            })
            ->editColumn('color', function ($mail_attribute) {
                return "<label class='badge' style='background: $mail_attribute->color'>$mail_attribute->color</label>";
            })
            ->addColumn('action', function ($mail_attribute) {
                return view('setting.mail-attributes.action', compact('mail_attribute'));
            })
            ->rawColumns(['name', 'color', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\AllMailDataTable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $mail_attributes = MailAttribute::select('mail_attributes.*');
        return $mail_attributes->newQuery();
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
            Column::make('type')
                ->title('Jenis Atribut'),
            Column::make('name')
                ->title('Nama Atribut'),
            Column::make('code')
                ->title('Kode Atribut'),
            Column::make('color')
                ->title('Warna Label'),
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
        return 'MailAttribute_' . date('YmdHis');
    }
}
