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

        return $dataTable->addColumn('action', 'open_hours.datatables_actions');
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
            'id_usaha' => new \Yajra\DataTables\Html\Column([
                'data'  => 'businesses.nama_usaha',
                'title' => 'Id Usaha'
            ]),
            'senin_buka',
            'senin_tutup',
            'selasa_buka',
            'selasa_tutup',
            'rabu_buka',
            'rabu_tutup',
            'kamis_buka',
            'kamis_tutup',
            'jumat_buka',
            'jumat_tutup',
            'sabtu_buka',
            'sabtu_tutup',
            'minggu_buka',
            'minggu_tutup'
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
