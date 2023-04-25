<?php

namespace App\Http\Livewire;

use Laracasts\Flash\Flash;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Register;

class RegistersTable extends DataTableComponent
{
    protected $model = Register::class;

    protected $listeners = ['deleteRecord' => 'deleteRecord'];

    public function deleteRecord($id)
    {
        Register::find($id)->delete();
        Flash::success(__('messages.deleted', ['model' => __('models/registers.singular')]));
        $this->emit('refreshDatatable');
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        $title = 'label_'.\App::getLocale();
        $serviceName = 'service.name_'.\App::getLocale();
        return [
            Column::make("Label Ar", "label_ar")
                ->sortable()
                ->searchable(),
            Column::make("Label En", "label_en")
                ->sortable()
                ->searchable(),

            Column::make("Type", "type")
                ->sortable()
                ->searchable(),
            Column::make("Category", "category")
                ->sortable()
                ->searchable(),
            Column::make("Year", "year")
                ->sortable()
                ->searchable(),
            Column::make("Service", $serviceName)
                ->sortable()
                ->searchable(),
            Column::make("Actions", 'id')
                ->format(
                    fn($value, $row, Column $column) => view('common.livewire-tables.actions', [
                        'showUrl' => route('registers.show', $row->id),
                        'editUrl' => route('registers.edit', $row->id),
                        'recordId' => $row->id,
                        'title' => $row->$title,
                    ])
                )
        ];
    }
}
