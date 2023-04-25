<?php

namespace App\Http\Livewire;

use Laracasts\Flash\Flash;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Mail;

class MailsTable extends DataTableComponent
{
    protected $model = Mail::class;

    protected $listeners = ['deleteRecord' => 'deleteRecord'];

    public function deleteRecord($id)
    {
        Mail::find($id)->delete();
        Flash::success(__('messages.deleted', ['model' => __('models/mails.singular')]));
        $this->emit('refreshDatatable');
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Objet", "objet")
                ->sortable()
                ->searchable(),

            Column::make("Created at", "created_at")
                ->sortable()
                ->searchable(),


            Column::make("Actions", 'id')
                ->format(
                    fn($value, $row, Column $column) => view('common.livewire-tables.mail', [
                        'showUrl' => route('mails.show', $row->id),
                        'recordUrl' => route('circulation.record', $row->id),
                        'sendUrl' => route('circulation.send', $row->id),
                        'processingUrl' => route('circulation.processing', $row->id),
                        'editUrl' => route('mails.edit', $row->id),
                        'recordId' => $row->id,
                        'title' => $row->objet,
                    ])
                )
        ];
    }
}
