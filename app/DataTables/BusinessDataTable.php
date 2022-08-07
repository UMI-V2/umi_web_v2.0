<?php

namespace App\DataTables;

use App\Models\Business;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class BusinessDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'businesses.datatables_actions')
        ->addColumn('name', function ($data) {
                return $data->users->name;
            })
        ->addColumn('nama_status_usaha', function ($data) {
            return $data->master_status_businesses->nama_status_usaha;
        })->addColumn('is_ambil_di_toko', function ($model) {
            if ($model->is_ambil_di_toko == '1') {
                return "Ya, Produk dapat diambil langsung di toko";
            } else {
                return "Tidak, Produk tidak dapat diambil langsung di toko";
            }
        })->addColumn('is_auto_payment', function ($model) {
            if ($model->is_auto_payment == '1') {
                return "Ya";
            } else {
                return "Tidak";
            }
        })->addColumn('is_manual_payment', function ($model) {
            if ($model->is_manual_payment == '1') {
                return "Ya";
            } else {
                return "Tidak";
            }
        })->addColumn('is_delivery', function ($model) {
            if ($model->is_delivery == '1') {
                return "Ya";
            } else {
                return "Tidak";
            }
        });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Business $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Business $model)
    {
        return $model->newQuery()->with('master_status_businesses')->with('users');
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
            'id' => ['title' => 'Id', 'visible' => false],
            'nama_usaha' => ['title' => 'Nama Usaha'],
            'name' => ['title' => 'Nama Pemilik'],
            'nama_status_usaha' => ['title' => 'Status Usaha'],
            'is_ambil_di_toko' => ['title' => 'Apakah produk dapat diambil langsung di Toko?'],
            'is_auto_payment' => ['title' => 'Apakah pembayaran dilakukan secara elektronik?'],
            'is_manual_payment' => ['title' => 'Apakah pembayaran dilakukan secara manual?'],
            'is_delivery' => ['title' => 'Apakah lapak menyediakan pengiriman?'],
            'deskripsi' => ['title' => 'Deskripsi'],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'businesses_datatable_' . time();
    }
}
