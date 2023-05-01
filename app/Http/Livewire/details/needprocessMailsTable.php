<?php

namespace App\Http\Livewire\details;

use App\Models\Mail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Laracasts\Flash\Flash;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class needprocessMailsTable extends DataTableComponent
{
    use AuthorizesRequests;

    protected $model = Mail::class;

    protected $listeners = ['deleteRecord' => 'deleteRecord'];

    public function deleteRecord($id)
    {
        $this->authorize('ViewAny', Mail::class);
        Mail::find($id)->delete();
        Flash::success(__('messages.deleted', ['model' => __('models/mails.singular')]));
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
                    ->needprocess(\Auth::user()->service_id);
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable()
                ->searchable(),
            Column::make("ref", "id")
                ->format( function ($value, $row, Column $column){
                            echo $row->actualregister(\Auth::user()->service_id)->first()->pivot->record_number;
                        }
                )->searchable(),

            Column::make("Objet", "objet")
                ->sortable()
                ->searchable(),

            Column::make("Created at", "created_at")
                ->sortable()
                ->searchable(),


            Column::make("Actions", 'id')
                ->format(
                    fn($value, $row, Column $column) => view('common.livewire-tables.details.needProcessMails', [
                        'showUrl' => route('mails.show', $row->id),
                        'processingUrl' => route('circulation.processing', $row->id),
                        'recordId' => $row->id,
                        'title' => $row->objet,
                    ])
                )
        ];
    }
}
