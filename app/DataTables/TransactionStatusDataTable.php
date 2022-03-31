<?php

namespace App\DataTables;

use App\Models\TransactionStatus;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class TransactionStatusDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable->addColumn('action', 'transaction_statuses.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\TransactionStatus $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(TransactionStatus $model)
    {
        return $model->newQuery()->with('sales_transactions');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false])
            ->parameters([
                'dom'       => 'Bfrtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [
                    ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],
                ],
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
            'id_transaksi_penjualan' => new \Yajra\DataTables\Html\Column([
                'data'  => 'sales_transactions.no_pemesanan',
                'title' => 'Transaksi Penjualan',
            ]),
            'tanggal_pesanan_dibuat',
            'tanggal_pembayaran',
            'tanggal_pesanan_dikirimkan',
            'tanggal_pesanan_diterima'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'transaction_statuses_datatable_' . time();
    }
}
