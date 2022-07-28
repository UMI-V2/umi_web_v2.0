<?php

namespace App\DataTables;

use App\Models\MasterBank;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class MasterBankDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'master_banks.datatables_actions')->addColumn('logo', function($data){
            return '<img src="'.$data->logo.'" width="50px" style="border-radius: 25%">';
        })
        ->rawColumns(['logo', 'action'])->addColumn('cost_admin', function ($model) {
            if ($model->cost_admin == '0') {
                return "Gratis Biaya Admin" ;
            } else {
                return  "Rp. " .number_format($model->cost_admin, 0, ',', '.');
            }
        });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\MasterBank $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(MasterBank $model)
    {
        return $model->newQuery();
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
            'name',
            'description',
            'cost_admin',
            'logo'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'master_banks_datatable_' . time();
    }
}
