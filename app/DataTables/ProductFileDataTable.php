<?php

namespace App\DataTables;

use App\Models\ProductFile;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class ProductFileDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'product_files.datatables_actions')->addColumn('nama', function ($data) {
            return $data->products->nama;
        })->addColumn('video', function ($model) {
            if ($model->video == '1') {
                return "Ya" ;
            } else {
                return  "Tidak";
            }
        })->addColumn('photo', function ($model) {
            if ($model->photo == '1') {
                return "Ya" ;
            } else {
                return  "Tidak";
            }
        })->addColumn('file', function($data){
            return '<img src="'.$data->file.'" width="400px" style="border-radius: 1%">';
        })->rawColumns(['file', 'action']);
    }

    // public function dataTable($query)
    // {
    //     $dataTable = new EloquentDataTable($query);

    //     return $dataTable->addColumn('image_url', function($data){
    //         return '<img src="'.$data->image_url.'" width="100px" height="100px">';
    //     })
    //     ->addColumn('action', 'product_files.datatables_actions')
    //     ->rawColumns(['image_url', 'action']);
    // }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\ProductFile $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(ProductFile $model)
    {
        return $model->newQuery()->with('products');
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

                        if(i === kolom['0'].length - 1 || i === kolom['0'].length - 4){
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
            'nama' => ([
                'data' => 'products.nama',
                'name' => 'products.nama',
                'title' => 'Produk',
            ]),
            'file',
            // 'image_url',
            'photo' => ([
                'data' => 'photo',
                'name' => 'photo',
                'title' => 'Apakah menggunakan Foto?',
            ]),
            'video' => ([
                'data' => 'video',
                'name' => 'video',
                'title' => 'Apakah menggunakan Video?',
            ]),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'product_files_datatable_' . time();
    }
}
