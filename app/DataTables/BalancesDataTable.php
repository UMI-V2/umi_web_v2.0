<?php

namespace App\DataTables;

use App\Models\Balances;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class BalancesDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'balances.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Balances $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Balances $model)
    {
        return $model->newQuery()->with(['master_transaction_categories', 'sales_transactions']);
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
                    ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
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
            'id_kategori_transaksi' => ([ 
                'data' => 'master_transaction_categories.nama_kategori_transaksi', 
                'name' => 'master_transaction_categories.nama_kategori_transaksi', 
                'title' => 'Kategori Transaksi' 
            ]),
            'id_transaksi_penjualan' => ([ 
                'data' => 'sales_transactions.no_pemesanan', 
                'name' => 'sales_transactions.no_pemesanan', 
                'title' => 'Transaksi Penjualan' 
            ]),
            'pengeluaran',
            'pemasukan',
            'deskripsi'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'balances_datatable_' . time();
    }
}
