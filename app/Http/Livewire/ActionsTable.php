<?php

namespace App\Http\Livewire;

use Laracasts\Flash\Flash;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Action;

class ActionsTable extends DataTableComponent
{
    protected $model = Action::class;

    protected $listeners = ['deleteRecord' => 'deleteRecord'];

    public function deleteRecord($id)
    {
        Action::find($id)->delete();
        Flash::success(__('messages.deleted', ['model' => __('models/actions.singular')]));
        $this->emit('refreshDatatable');
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Name Ar", "name_ar")
                ->sortable()
                ->searchable(),
            Column::make("Name En", "name_en")
                ->sortable()
                ->searchable(),
            Column::make("Actions", 'id')
                ->format(
                    fn($value, $row, Column $column) => view('common.livewire-tables.actions', [
                        'showUrl' => route('actions.show', $row->id),
                        'editUrl' => route('actions.edit', $row->id),
                        'recordId' => $row->id,
                        'title' => $row->name_en,
                    ])
                )
        ];
    }
}
