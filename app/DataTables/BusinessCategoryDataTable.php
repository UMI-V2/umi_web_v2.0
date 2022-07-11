<?php

namespace App\DataTables;

use App\Models\BusinessCategory;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class BusinessCategoryDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'business_categories.datatables_actions')->addColumn(
            'nama_usaha', 
            function ($data) {
                return $data->businesses->nama_usaha;
            }
        )->addColumn('nama_kategori_usaha', function ($data) {
            return $data->master_business_categories->nama_kategori_usaha;
        });;
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\BusinessCategory $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(BusinessCategory $model)
    {
        return $model->newQuery()->with('businesses')->with('master_business_categories');
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
            'nama_usaha' => ([
                'data' => 'businesses.nama_usaha',
                'name' => 'businesses.nama_usaha',
                'title' => 'Nama Usaha',
            ]),
            'nama_kategori_usaha' => ([
                'data' => 'master_business_categories.nama_kategori_usaha',
                'name' => 'master_business_categories.nama_kategori_usaha',
                'title' => 'Nama Kategori Usaha',
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
        return 'business_categories_datatable_' . time();
    }
}
