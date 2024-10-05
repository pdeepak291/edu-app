<?php

namespace App\DataTables;

use App\Models\Access;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Image;

class UsersDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        $view = Access::have_access(9);
        $edit = Access::have_access(10);
        $delete = Access::have_access(11);

        return (new EloquentDataTable($query))
            ->addColumn('image', function ($item) {
                $url = asset("storage/app/public/uploads/user/photo/$item->image"); 
                return '<img src="'.$url.'" class="user-image rounded-circle" width="50" height="50">';
            })
            ->addColumn('action', function ($item)use($view,$edit,$delete){
                $html = '';
                if($view){
                    $html .= '<a href="'.route('user.view',encrypt($item->id)).'" title="View"><i class="mdi mdi-24px mdi-magnify-plus text-info"></i></a>';
                }
                if($edit){
                    $html .= '<a href="'.route('user.edit',encrypt($item->id)).'" title="Edit"><i class="mdi mdi-24px mdi-pencil text-success"></i></a>';
                }
                if($delete){
                    $html .= '<a href="'.route('user.delete',encrypt($item->id)).'" title="Delete" onClick="return confirm(\'Are you sure you want to delete?\');"><i class="mdi mdi-24px mdi-delete-empty text-danger"></i></a>';
                }
                return $html;
            })->rawColumns(['image', 'action'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(User $model): QueryBuilder
    {
        $query = User::select('users.*', 'roles.role_name as role')
        ->join('roles', 'users.role_id', '=', 'roles.id')
        ->orderBy('users.name');

        return $this->applyScopes($query);
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('users-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
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
            Column::computed('image')
                ->title('Image')
                ->exportable(false)
                ->printable(false)
                ->addClass('text-center')
                ->width(80),
            Column::make('name'),
            Column::make('role')->name('roles.role_name'),
            Column::make('email'),
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
        return 'Users_' . date('YmdHis');
    }
}
