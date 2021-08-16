<?php

namespace App\DataTables;

use App\Models\Mail;
use App\Models\User;
use App\Utilities\RouteHelper;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ArchivedMailDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
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
                                style='background: $attribute->color;'>$attribute->name</label>";
                })->implode('<br>');
            })
            ->editColumn('mail_created_at', function ($mail) {
                return $mail->mail_created_at->isoFormat('D MMMM Y');
            })
            ->editColumn('archived_at', function ($mail) {
                return $mail->archived_at->isoFormat('D MMMM Y (hh:mm)');
            })
            ->addColumn('action', function ($mail) {
                return view('partials.arhived-mail-action', compact('mail'));
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
        $mail = Mail::whereNotNull('archived_at')->with('attributes')
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
                Button::make('print'),
                Button::make('reset', 'asdf'),
            );
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
            Column::make('mail_created_at')
                ->title('Tanggal Surat'),
            Column::make('archived_at')
                ->title('Tanggal Arsip'),
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
        return 'AllMail_' . date('YmdHis');
    }
}
