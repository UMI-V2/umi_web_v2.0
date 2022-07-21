<?php

namespace App\DataTables;

use App\Models\User;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class UserDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'users.datatables_actions')->addColumn(
            'nama_hak_akses_pengguna', 
            function ($data) {
                return $data->master_privileges->nama_hak_akses_pengguna;
            }
        )->addColumn('nama_status_pengguna', function ($data) {
            return $data->master_status_users->nama_status_pengguna;
        });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
    {
        return $model->newQuery()->with('master_privileges')->with('master_status_users');
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
                // $('input#0').attr('placeholder', 'Cari berdasarkan Nama');
                
                // $('input#1').attr('placeholder', 'Cari berdasarkan Akses');
                
                // $('input#2').attr('placeholder', 'Cari berdasarkan Status');
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
            'name' => ['title' => 'Nama'],
            // 'nama_hak_akses_pengguna' => ['title' => 'Akses Sebagai'],
            // 'nama_status_pengguna' => [
            //     'title' => 'Status Akun',
            //     'data' => 'master_privileges.nama_hak_akses_pengguna',
            // ],
            // 'username',
            // 'jenis_kelamin',
            // 'tanggal_lahir',
            // 'no_hp',
            // 'foto',
            // 'email',
            // 'password',
            'nama_hak_akses_pengguna' => ([
                'data' => 'master_privileges.nama_hak_akses_pengguna',
                'name' => 'master_privileges.nama_hak_akses_pengguna',
                'title' => 'Hak Akses'
            ]),
            'nama_status_pengguna' => ([
                'data' => 'master_status_users.nama_status_pengguna',
                'name' => 'master_status_users.nama_status_pengguna',
                'title' => 'Status'
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
        return 'users_datatable_' . time();
    }
}
