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

        return $dataTable->addColumn('action', 'businesses.datatables_actions')->addColumn(
            'name', 
            function ($data) {
                return $data->users->name;
            }
        )->addColumn('nama_status_usaha', function ($data) {
            return $data->master_status_businesses->nama_status_usaha;
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
            'id' => ['visible' => false],
            'name' => ([
                'data' => 'users.name',
                'name' => 'users.name',
                'title' => 'Name',
            ]),
            'nama_status_usaha' => ([
                'data' => 'master_status_businesses.nama_status_usaha',
                'name' => 'master_status_businesses.nama_status_usaha',
                'title' => 'Nama Status Usaha',
            ]),
            'nama_usaha'
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
