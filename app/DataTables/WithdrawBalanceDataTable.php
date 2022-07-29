<?php

namespace App\DataTables;

use App\Models\WithdrawBalance;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class WithdrawBalanceDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'withdraw_balances.datatables_actions')->addColumn(
            'name', 
            function ($data) {
                return $data->users->name;
            })->addColumn('nama_usaha', function ($data) {
                return $data->businesses->nama_usaha;
            })->addColumn('nama_bank', function ($data) {
                return $data->master_banks->name;
            })->addColumn('nominal_request', function ($model) {
                if ($model->nominal_request == '0') {
                    return "Invalid Request" ;
                } else {
                    return  "Rp. " .number_format($model->nominal_request, 0, ',', '.');
                }
            })->addColumn('total_withdraw', function ($model) {
                if ($model->total_withdraw == '0') {
                    return "Invalid Request" ;
                } else {
                    return  "Rp. " .number_format($model->total_withdraw, 0, ',', '.');
                }
            })->addColumn('cost_admin', function ($model) {
                if ($model->cost_admin == '0') {
                    return "Invalid Request" ;
                } else {
                    return  "Rp. " .number_format($model->cost_admin, 0, ',', '.');
                }
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\WithdrawBalance $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(WithdrawBalance $model)
    {
        return $model->newQuery()->with('users')->with('businesses')->with('master_banks');
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
                    // ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
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
            // 'bank_name' => ['visible' => false],
            'name' => ([
                'data' => 'users.name',
                'name' => 'users.name',
                'title' => 'Pemilik Usaha',
            ]),
            'nama_usaha' => ([
                'data' => 'businesses.nama_usaha',
                'name' => 'businesses.nama_usaha',
                'title' => 'Nama Usaha',
            ]),
            'nama_bank' => ([
                'data' => 'master_banks.name',
                'name' => 'master_banks.name',
                'title' => 'Nama Bank',
            ]),
            'status' => ([
                'data' => 'status',
                'name' => 'status',
                'title' => 'Status',
            ]),
            'nominal_request' => ([
                'data' => 'nominal_request',
                'name' => 'nominal_request',
                'title' => 'Permintaan Penarikan',
            ]),
            'no_rek' => ([
                'data' => 'no_rek',
                'name' => 'no_rek',
                'title' => 'No Rekening',
            ]),
            'rek_name' => ([
                'data' => 'rek_name',
                'name' => 'rek_name',
                'title' => 'Atas Nama',
            ]),
            'cost_admin' => ([
                'data' => 'cost_admin',
                'name' => 'cost_admin',
                'title' => 'Biaya Admin',
            ]),
            'total_withdraw' => ([
                'data' => 'total_withdraw',
                'name' => 'total_withdraw',
                'title' => 'Total Withdraw',
            ]),
            'note' => ([
                'data' => 'note',
                'name' => 'note',
                'title' => 'Catatan',
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
        return 'withdraw_balances_datatable_' . time();
    }
}
