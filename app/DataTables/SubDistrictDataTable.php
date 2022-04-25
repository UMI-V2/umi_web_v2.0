<?php

namespace App\DataTables;

use App\Models\SubDistrict;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class SubDistrictDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'sub_districts.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\SubDistrict $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(SubDistrict $model)
    {
        return $model->newQuery()->with('master_provinces')->with('cities');
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
            'id_provinsi' => new \Yajra\DataTables\Html\Column([
                'data' => 'master_provinces.nama_provinsi',
                'name' => 'master_provinces.nama_provinsi',
                'title' => 'Provinsi'
            ]),
            'id_kota' => new \Yajra\DataTables\Html\Column([
                'data' => 'cities.nama_kota',
                'name' => 'cities.nama_kota',
                'title' => 'Kota'
            ]),
            'nama_kecamatan'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'sub_districts_datatable_' . time();
    }
}
