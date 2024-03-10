<?php

namespace App\DataTables;

use App\Models\Access;
use App\Models\University;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class UniversitiesDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        $view = Access::have_access(14);
        $edit = Access::have_access(15);
        $delete = Access::have_access(16);

        return (new EloquentDataTable($query))
            ->addColumn('action', function ($item)use($view,$edit,$delete){
                $html = '';
                if($view){
                    $html .= '<a href="'.route('university.view',encrypt($item->id)).'" title="View"><i class="mdi mdi-24px mdi-magnify-plus text-info"></i></a>';
                }
                if($edit){
                    $html .= '<a href="'.route('university.edit',encrypt($item->id)).'" title="Edit"><i class="mdi mdi-24px mdi-pencil text-success"></i></a>';
                }
                if($delete){
                    $html .= '<a href="'.route('university.delete',encrypt($item->id)).'" title="Delete" onClick="return confirm(\'Are you sure you want to delete?\');"><i class="mdi mdi-24px mdi-delete-empty text-danger"></i></a>';
                }
                return $html;
            })->rawColumns(['image', 'action'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(University $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('universities-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(0,'ASC')
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('university_code'),
            Column::make('university_name'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Universities_' . date('YmdHis');
    }
}
