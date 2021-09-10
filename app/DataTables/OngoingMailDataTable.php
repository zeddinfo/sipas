<?php

namespace App\DataTables;

use App\Models\Mail;
use Illuminate\Support\Str;
use App\Utilities\RouteHelper;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class OngoingMailDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->editColumn('title', function ($mail) {
                return "<a href='" . route(RouteHelper::get('mail.master.show'), $mail) . "'><b>$mail->title</b><br>$mail->code</a>";
            })
            ->editColumn('type', function ($mail) {
                return $mail->type == 'IN' ? 'Surat Masuk' : " Surat Keluar";
            })
            ->addColumn('attributes_name', function ($mail) {
                return $mail->attributes->map(function ($attribute) {
                    return "<label class='badge'
                                style='background: $attribute->color;'>" . Str::limit($attribute->name, 20) . "</label>";
                })->implode('<br>');
            })
            ->editColumn('mail_created_at', function ($mail) {
                return $mail->mail_created_at->isoFormat('D MMMM Y');
            })
            ->addColumn('action', function ($mail) {
                return view('partials.archived-mail-action', compact('mail'));
            })
            ->rawColumns(['title', 'attributes_name', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\AllMailDataTable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $mail = Mail::whereNull('archived_at')->with('attributes')
            ->select('mails.*');
        return $mail->newQuery();
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
            Column::make('title')
                ->name('mails.title')
                ->title('Judul Surat'),
            Column::make('type')
                ->title('Jenis'),
            Column::make('instance')
                ->title('Instansi'),
            Column::make('attributes_name')
                ->name('attributes.name')
                ->title('Atribut Surat')
                ->orderable(false),
            Column::make('note')
                ->name('mails.note')
                ->title('Catatan Surat'),
            Column::make('mail_created_at')
                ->title('Tanggal Surat'),
            Column::make('action')
                ->title('Aksi')
                ->orderable(false)
                ->searchable(false)
                ->printable(false)
                ->exportable(false),
            Column::make('code')
                ->title('Nomor Surat')
                ->visible(false)
                ->orderable(false)
                ->printable(true)
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'OngoingMail_' . date('YmdHis');
    }
}
