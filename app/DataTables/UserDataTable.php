<?php

namespace App\DataTables;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
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
        
        return $dataTable->addColumn('action', 'users.datatables_actions')
        ->addColumn('nama_hak_akses_pengguna', function ($data) {
                return $data->master_privileges->nama_hak_akses_pengguna;
        })->addColumn('nama_status_pengguna', function ($data) {
            return $data->master_status_users->nama_status_pengguna;
        })->addColumn('id', function ($data) {
            return $data->id;
        })->addColumn('jenis_kelamin', function ($data) {
            if ($data->jenis_kelamin == 'L') {
                return "Laki-laki" ;
            } else {
                return  "Perempuan";
            }
        })->addColumn('profile_photo_url', function($data){
            return '<img src="'.$data->profile_photo_url.'" width="50px" style="border-radius: 25%">';
        })->rawColumns(['profile_photo_url', 'action']);
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
     * @param \App\Models\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
    {
        $user = User::with('master_privileges')->find(Auth::user()->id);
        // return $model->newQuery()->with('master_privileges')->with('master_status_users');
        if($user->id_privilege ==1){
            return $model->newQuery()->with('master_privileges')->with('master_status_users');
        }else if($user->id_privilege ==2){
            return $model->newQuery()->where('id_privilege','!=', 1)->with('master_privileges')->with('master_status_users');
        }else{
            return $model->newQuery()->where('id_privilege', 4)->orWhere('id_privilege', 5)->with('master_privileges')->with('master_status_users');
        }
        
        // return $model->newQuery()->with('master_privileges')->with('master_status_users');
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

                        if(i === kolom['0'].length - 1 || i === kolom['0'].length - 10){
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
            'profile_photo_url' => ['title' => 'Foto Profil'],
            'name' => ['title' => 'Nama'],
            'nama_hak_akses_pengguna' => ['title' => 'Akses Sebagai'],
            'nama_status_pengguna' => ['title' => 'Status Akun'],
            'jenis_kelamin',
            'tanggal_lahir',
            'no_hp',
            'email',
            'username',
            // 'nama_hak_akses_pengguna' => ([
            //     'data' => 'master_privileges.nama_hak_akses_pengguna',
            //     'name' => 'master_privileges.nama_hak_akses_pengguna',
            //     'title' => 'Hak Akses'
            // ]),
            // 'nama_status_pengguna' => ([
            //     'data' => 'master_status_users.nama_status_pengguna',
            //     'name' => 'master_status_users.nama_status_pengguna',
            //     'title' => 'Status'
            // ]),
            // 'foto',
            // 'password' => ['visible' => false],
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
