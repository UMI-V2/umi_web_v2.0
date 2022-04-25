<?php

namespace App\DataTables;

use App\Models\Rating;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class RatingDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'ratings.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Rating $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Rating $model)
    {
        return $model->newQuery()->with('products')->with('sales_transactions');
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
            'id_produk' => new \Yajra\DataTables\Html\Column([
                'data'  => 'products.nama',
                'name'  => 'products.nama',
                'title' => 'Produk',
            ]),
            'id_transaksi_penjualan' => new \Yajra\DataTables\Html\Column([
                'data'  => 'sales_transactions.id',
                'name'  => 'sales_transactions.id',
                'title' => 'Transaksi Penjualan',
            ]),
            'rating',
            'ulasan'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'ratings_datatable_' . time();
    }
}
