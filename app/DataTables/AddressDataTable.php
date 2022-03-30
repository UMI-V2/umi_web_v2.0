<?php

namespace App\DataTables;

use App\Models\Address;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class AddressDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'addresses.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Address $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Address $model)
    {
        return $model->newQuery()->with('users')->with('master_provinces')->with('cities')->with('sub_districts');
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
            'id_users' => new \Yajra\DataTables\Html\Column([
                'data'  => 'users.name',
                'name'  => 'users.name',
                'title' => 'Id Pengguna',
            ]),
            'id_provinsi' => new \Yajra\DataTables\Html\Column([
                'data'  => 'master_provinces.nama_provinsi',
                'name'  => 'master_provinces.nama_provinsi',
                'title' => 'Provinsi',
            ]),
            'id_kota' => new \Yajra\DataTables\Html\Column([
                'data'  => 'cities.nama_kota',
                'name'  => 'cities.nama_kota',
                'title' => 'Kota',
            ]),
            'id_kecamatan' => new \Yajra\DataTables\Html\Column([
                'data'  => 'sub_districts.nama_kecamatan',
                'name'  => 'sub_districts.nama_kecamatan',
                'title' => 'Kecamatan',
            ]),
            'nama',
            'no_hp',
            'alamat_lengkap',
            'patokan',
            // 'is_alamat_utama',
            // 'is_rumah',
            // 'is_kantor',
            // 'is_usaha',
            // 'latitude',
            // 'longitude'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'addresses_datatable_' . time();
    }
}
