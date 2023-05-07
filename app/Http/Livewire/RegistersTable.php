<?php

namespace App\Http\Livewire;

use App\Models\Scopes\RegisterYearScope;
use App\Models\Scopes\ServiceScope;
use Illuminate\Database\Eloquent\Builder;
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

    public function builder(): Builder
    {
        return $this->getModel()::query()
            ->with($this->getRelationships())
            ->withoutGlobalScope(RegisterYearScope::class)
            ->withoutGlobalScope(ServiceScope::class);

    }


    public function columns(): array
    {
        $title = 'label_'.\App::getLocale();
        $serviceName = 'service.name_'.\App::getLocale();
        return [
            Column::make(__('models/Registers.fields.label_ar'), "label_ar")
                ->sortable()
                ->searchable(),
            Column::make(__('models/Registers.fields.label_en'), "label_en")
                ->sortable()
                ->searchable(),

            Column::make(__('models/Registers.fields.type'), "type")
                ->sortable()
                ->searchable(),
            Column::make(__('models/Registers.fields.category'), "category")
                ->sortable()
                ->searchable(),
            Column::make(__('models/Registers.fields.year'), "year")
                ->sortable()
                ->searchable(),
            Column::make(__('models/Registers.fields.service'), $serviceName)
                ->sortable()
                ->searchable(),
            Column::make(__('crud.actions'), 'id')
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
