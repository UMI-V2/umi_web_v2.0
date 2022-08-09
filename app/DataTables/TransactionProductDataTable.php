<?php

namespace App\DataTables;

use App\Models\TransactionProduct;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class TransactionProductDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'transaction_products.datatables_actions')->addColumn('harga_produk', function ($model) {
            if ($model->harga_produk == '0') {
                return "Gratis" ;
            } else {
                return  "Rp. " .number_format($model->harga_produk, 0, ',', '.');
            }
        })->addColumn('harga_diskon', function ($model) {
            if ($model->harga_diskon == '0') {
                return "Gratis" ;
            } else {
                return  "Rp. " .number_format($model->harga_diskon, 0, ',', '.');
            }
        })->addColumn('kondisi', function ($model) {
            if ($model->kondisi == true) {
                return "Baru" ;
            } else {
                return  "Bekas";
            }
        })->addColumn('preorder', function ($model) {
            if ($model->preorder == true) {
                return "Ya, Product ini dapat di preorder" ;
            } else {
                return  "Tidak, Product ini tidak dapat di preorder";
            }
        });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\TransactionProduct $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(TransactionProduct $model)
    {
        return $model->newQuery()->with(['sales_transactions', 'products']);
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
                'stateSave' => false,
                'order'     => [[0, 'desc']],
                'buttons'   => [
                    // ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],
                ],
'initComplete' => "function () {
                    var kolom = this.api().columns();
                    kolom.every(function (i) {

                        if(i === kolom['0'].length - 1){
                            return false;
                        }
                        var column = this;
                        var input = document.createElement(\"input\");
                        input.setAttribute('id', i);
                        $(input).appendTo($(column.footer()).empty())
                        .on('keyup', function () {
                            column.search($(this).val()).draw();
                        }).attr('placeholder', 'Search');                        
                    }); 
                }",
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
            'id' => ['visible' => false],
            'id_transaksi_penjualan' => ([
                'data' => 'sales_transactions.no_pemesanan', 
                'name' => 'sales_transactions.no_pemesanan', 
                'title' => 'Transaksi Penjualan'
            ]),
            'id_produk' => ([
                'data' => 'products.nama', 
                'name' => 'products.nama', 
                'title' => 'Produk'
            ]),
            'harga_produk',
            'harga_diskon',
            'deskripsi_produk',
            'kondisi',
            'preorder',
            // 'ongkir'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'transaction_products_datatable_' . time();
    }
}
