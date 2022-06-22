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

        return $dataTable->addColumn('action', 'users.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
    {
        return $model->newQuery()->with('MasterPrivilege')->with('MasterStatusUser');
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
                'initComplete' => "function () {
                    this.api().columns([0,1,2]).every(function (i) {
                        var column = this;
                        var input = document.createElement(\"input\");
                        input.setAttribute('id', i);
                        $(input).appendTo($(column.footer()).empty())
                        .on('keyup', function () {
                            column.search($(this).val()).draw();
                        });

                        
                    });
                    
                    $('input#0').attr('placeholder', 'Cari berdasarkan Nama');

                    
                    $('input#1').attr('placeholder', 'Cari berdasarkan Akses');

                    
                    $('input#2').attr('placeholder', 'Cari berdasarkan Status');
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
            'name' => ['title' => 'Nama'],
            // 'username',
            // 'jenis_kelamin',
            // 'tanggal_lahir',
            // 'no_hp',
            // 'foto',
            // 'email',
            // 'password',
            'id_privilege'=> new \Yajra\DataTables\Html\Column([
                'data' => 'master_privilege.nama_hak_akses_pengguna',
                'name' => 'master_privilege.nama_hak_akses_pengguna',
                'title' => 'Master Privilege'
            ]),
            'id_status_pengguna'=> new \Yajra\DataTables\Html\Column([
                'data' => 'master_status_user.nama_status_pengguna',
                'name' => 'master_status_user.nama_status_pengguna',
                'title' => 'Master Status User'
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
