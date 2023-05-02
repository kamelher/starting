<?php

namespace App\Http\Livewire;

use Laracasts\Flash\Flash;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Service;

class ServicesTable extends DataTableComponent
{
    protected $model = Service::class;

    protected $listeners = ['deleteRecord' => 'deleteRecord'];

    public function deleteRecord($id)
    {
        Service::find($id)->delete();
        Flash::success(__('messages.deleted', ['model' => __('models/services.singular')]));
        $this->emit('refreshDatatable');
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {

        return [
            Column::make("", "thumbnail") ->format(
                fn($value, $row, Column $column) => view('common.livewire-tables.image', [
                    'path'=>$row->getMedia('thumbnail')
                ])
            ),
            Column::make(__('models/Services.fields.name_ar'), "name_ar")
                ->sortable()
                ->searchable(),
            Column::make(__('models/Services.fields.name_en'), "name_en")
                ->sortable()
                ->searchable(),

            Column::make(__('models/Services.fields.abr_latin'), "abr_latin")
                ->sortable()
                ->searchable(),
            Column::make(__('models/Services.fields.abr_ar'), "abr_ar")
                ->sortable()
                ->searchable(),
            Column::make(__('crud.actions'), 'id')
                ->format(
                    fn($value, $row, Column $column) => view('common.livewire-tables.actions', [
                        'showUrl' => route('services.show', $row->id),
                        'editUrl' => route('services.edit', $row->id),
                        'recordId' => $row->id,
                        'title' => $row->name_en,
                        'path'=>$row->getMedia('thumbnail')
                    ])
                )
        ];
    }
}
