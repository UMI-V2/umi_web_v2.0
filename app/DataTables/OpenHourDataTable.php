<?php

namespace App\DataTables;

use App\Models\OpenHour;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class OpenHourDataTable extends DataTable
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
        return $dataTable->addColumn('nama_usaha', function ($data) {
            return $data->businesses->nama_usaha;
        })->addColumn('senin', function ($data) {
            return $data->senin_buka . ' - ' . $data->senin_tutup;
        })->addColumn('selasa', function ($data) {
            return $data->selasa_buka . ' - ' . $data->selasa_tutup;
        })->addColumn('rabu', function ($data) {
            return $data->rabu_buka . ' - ' . $data->rabu_tutup;
        })->addColumn('kamis', function ($data) {
            return $data->kamis_buka . ' - ' . $data->kamis_tutup;
        })->addColumn('jumat', function ($data) {
            return $data->jumat_buka . ' - ' . $data->jumat_tutup;
        })->addColumn('sabtu', function ($data) {
            return $data->sabtu_buka . ' - ' . $data->sabtu_tutup;
        })->addColumn('minggu', function ($data) {
            return $data->minggu_buka . ' - ' . $data->minggu_tutup;
        })->addColumn('action', 'open_hours.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\OpenHour $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(OpenHour $model)
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
                'data'  => 'businesses.nama_usaha',
                'title' => 'Nama Toko'
            ]),
            'senin',
            'selasa',
            'rabu',
            'kamis',
            // 'jumat',
            // 'sabtu',
            // 'minggu',
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'open_hours_datatable_' . time();
    }
}
