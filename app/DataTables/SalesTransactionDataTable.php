<?php

namespace App\DataTables;

use App\Models\SalesTransaction;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class SalesTransactionDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'sales_transactions.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\SalesTransaction $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(SalesTransaction $model)
    {
        return $model->newQuery()->with(['users', 'businesses', 'business_payment_methods', 'sales_delivery_services']);
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
            'id_user' => new \Yajra\DataTables\Html\Column([
                'data'  => 'users.name',
                'title' => 'User',
            ]),
            'id_usaha' => new \Yajra\DataTables\Html\Column([
                'data'  => 'businesses.nama_usaha',
                'title' => 'Usaha',
            ]),
            // 'id_metode_pembayaran' => new \Yajra\DataTables\Html\Column([
            //     'data'  => 'business_payment_methods.id_metode_pembayaran',
            //     'title' => 'Metode Pembayaran',
            // ]),
            'id_sales_delivery_service' => new \Yajra\DataTables\Html\Column([
                'data'  => 'sales_delivery_services.jenis_layanan',
                'title' => 'Sales Delivery Service',
            ]),
            'no_pemesanan',
            // 'subtotal_produk',
            // 'subtotal_ongkir',
            'diskon',
            'biaya_penanganan',
            'link_pembayaran',
            'total_pesanan',
            // 'is_ambil_di_toko',
            // 'is_rating'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'sales_transactions_datatable_' . time();
    }
}
