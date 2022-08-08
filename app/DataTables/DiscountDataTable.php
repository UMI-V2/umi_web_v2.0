<?php

namespace App\DataTables;

use App\Models\Discount;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class DiscountDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'discounts.datatables_actions')->addColumn('nama_usaha', function ($data) {
            return $data->businesses->nama_usaha;
        })->addColumn('type', function ($model) {
            if ($model->type == '1') {
                return "Potongan Harga" ;
            } else {
                return  "Persentase";
            }
        })->addColumn('potongan', function ($model) {
            if ($model->type == '1') {
                return  "Rp. " .number_format($model->potongan, 0, ',', '.');
            } else {
                return $model->potongan." %";
            }
        });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Discount $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Discount $model)
    {
        return $model->newQuery()->with('businesses');
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
            'nama_usaha' => ([
                'data' => 'businesses.nama_usaha',
                'name' => 'businesses.nama_usaha',
                'title' => 'Nama Toko',
            ]),
            // 'id_usaha' => ([
            //     'data' => 'businesses.nama_usaha',
            //     'name' => 'businesses.nama_usaha',
            //     'title' => 'Nama Usaha',
            // ]),
            'nama_promo',
            'type' => ([
                'data' => 'type',
                'name' => 'type',
                'title' => 'Tipe Diskon',
            ]),
            'potongan',
            // 'waktu_mulai',
            // 'waktu_berakhir',
            // 'batas_pembelian',
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'discounts_datatable_' . time();
    }
}
