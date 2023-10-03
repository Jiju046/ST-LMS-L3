<?php

namespace App\DataTables;

use App\Models\Book;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class BooksDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return datatables()
        ->eloquent($query)
        ->editColumn('available_days', function ($data){
            return 'available on '.$data->available_days;
        })
        ->addColumn('action', function ($data) {
            return '
                <div class="btn-group">
                    <a href="' . route('books.show', $data->id) . '"><img src="' . asset('icons/eye.png') . '" width="32"></a>
                    <a href="' . route('books.edit', $data->id) . '" class="edit-btn mx-2" data-id="' . $data->id . '"><img src="' . asset('icons/pen.png') . '" width="25"></a>
                    <button type="button" class="delete-btn border-0" style="background-color:white" data-id="' . $data->id . '" onclick="deleteBook(this)"><img src="' . asset('icons/delete.png') . '" width="25"></button>
                </div>
            ';
        })
        // ->setRowId('id')
        ->rawColumns(['action']);
    }

    public function query(Book $model): QueryBuilder
    {
        return $model->newQuery();
    }

    public function html()
    {
        return $this->builder()
                    ->columns($this->getColumns())
                    ->parameters([
                        'dom'          => 'Blfrtip',
                        'buttons'      => ['export'],
                    ]);
    }

    public function getColumns(): array
    {
        return [
            'id',
            'title',
            'available_days',
            Column::make('action')
                ->exportable(false)
                ->printable(false)
                ->width(200)
                ->addClass('text-center')
                ->orderable(false)
                ->searchable(false)
        ];
    }


    protected function filename(): string
    {
        return 'Books_' . date('YmdHis');
    }
}