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
        return $model->newQuery()->with('users')->with('master_provinces')->with('master_cities')->with('sub_districts');
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
            'id_users' => ([
                'data'  => 'users.name',
                'name'  => 'users.name',
                'title' => 'Id Pengguna',
            ]),
            'province_id' => ([
                'data'  => 'master_provinces.province_name',
                'name'  => 'master_provinces.province_name',
                'title' => 'Provinsi',
            ]),
            'city_id' => ([
                'data'  => 'master_cities.city_name',
                'name'  => 'master_cities.city_name',
                'title' => 'Kota',
            ]),
            'subdistrict_id' => ([
                'data'  => 'sub_districts.subdistrict_name',
                'name'  => 'sub_districts.subdistrict_name',
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
