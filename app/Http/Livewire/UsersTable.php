<?php

namespace App\Http\Livewire;

use Laracasts\Flash\Flash;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\User;

class UsersTable extends DataTableComponent
{
    protected $model = User::class;

    protected $listeners = ['deleteRecord' => 'deleteRecord'];

    public function deleteRecord($id)
    {
        User::find($id)->delete();
        Flash::success(__('messages.deleted', ['model' => __('models/users.singular')]));
        $this->emit('refreshDatatable');
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {

        return [
            Column::make(__('models/Users.fields.name'), "name")
                ->sortable()
                ->searchable(),
            Column::make(__('models/Users.fields.email'), "email")
                ->sortable()
                ->searchable(),
            Column::make(__('crud.actions'), 'id')
                ->format(
                    fn($value, $row, Column $column) => view('common.livewire-tables.actions', [
                        'showUrl' => route('users.show', $row->id),
                        'editUrl' => route('users.edit', $row->id),
                        'recordId' => $row->id,
                        'title' => $row->name,
                    ])
                )
        ];
    }
}
