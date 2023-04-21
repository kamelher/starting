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
            Column::make("Name Ar", "name_ar")
                ->sortable()
                ->searchable(),
            Column::make("Name En", "name_en")
                ->sortable()
                ->searchable(),
            Column::make("Thumbnail", "thumbnail")
                ->sortable()
                ->searchable(),
            Column::make("Abrivation Ar", "abrivation_ar")
                ->sortable()
                ->searchable(),
            Column::make("Abrivation En", "abrivation_en")
                ->sortable()
                ->searchable(),
            Column::make("Actions", 'id')
                ->format(
                    fn($value, $row, Column $column) => view('common.livewire-tables.actions', [
                        'showUrl' => route('services.show', $row->id),
                        'editUrl' => route('services.edit', $row->id),
                        'recordId' => $row->id,
                        'title' => __('crud.edit') . ' ' . $row->name_en,
                    ])
                )
        ];
    }
}
