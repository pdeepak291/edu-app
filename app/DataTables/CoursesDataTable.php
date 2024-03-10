<?php

namespace App\DataTables;

use App\Models\Access;
use App\Models\Course;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CoursesDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        $view = Access::have_access(19);
        $edit = Access::have_access(20);
        $delete = Access::have_access(21);

        return (new EloquentDataTable($query))
            ->addColumn('action', function ($item)use($view,$edit,$delete){
                $html = '';
                if($view){
                    $html .= '<a href="'.route('course.view',encrypt($item->id)).'" title="View"><i class="mdi mdi-24px mdi-magnify-plus text-info"></i></a>';
                }
                if($edit){
                    $html .= '<a href="'.route('course.edit',encrypt($item->id)).'" title="Edit"><i class="mdi mdi-24px mdi-pencil text-success"></i></a>';
                }
                if($delete){
                    $html .= '<a href="'.route('course.delete',encrypt($item->id)).'" title="Delete" onClick="return confirm(\'Are you sure you want to delete?\');"><i class="mdi mdi-24px mdi-delete-empty text-danger"></i></a>';
                }
                return $html;
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Course $model): QueryBuilder
    {
        $query = Course::select('courses.*', 'universities.university_name as university')
        ->join('universities', 'courses.university_id', '=', 'universities.id')
        ->orderBy('courses.course_name');

        return $this->applyScopes($query);
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('courses-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(0)
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
            Column::make('course_code'),
            Column::make('course_name'),
            Column::make('university')->name('universities.university_name'),
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
        return 'Courses_' . date('YmdHis');
    }
}
