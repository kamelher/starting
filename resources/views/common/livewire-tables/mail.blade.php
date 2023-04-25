<div class='btn-group'>
    <a href="#popUp" href="{{ $editUrl }}"
       class='btn btn-default btn-xs' onclick="loadeditform('{{ $showUrl }}', '  {{__('crud.show') . ' ' . $title }}')">
        <i class="fa fa-eye"></i>
    </a>

    <a href="#popUp" href="{{ $recordUrl }}"
       class='btn btn-success btn-xs' onclick="loadeditform('{{ $recordUrl }}', '  {{__('crud.record') . ' ' . $title }}')">
        <i class="fa fa-registered"></i>
    </a>

    <a href="#popUp" href="{{ $sendUrl }}"
       class='btn btn-info btn-xs' onclick="loadeditform('{{ $sendUrl }}', '  {{__('crud.send') . ' ' . $title }}')">
        <i class="fa fa-mail-bulk"></i>
    </a>

    <a href="#popUp" href="{{ $processingUrl }}"
       class='btn btn-danger btn-xs' onclick="loadeditform('{{ $processingUrl }}', '  {{__('crud.process') . ' ' . $title }}')">
        <i class="fa fa-user-cog"></i>
    </a>

    <a href="#popUp" href="{{ $editUrl }}"
        class='btn btn-default btn-xs' onclick="loadeditform('{{ $editUrl }}', '{{__('crud.edit') . ' ' . $title }}')">
        <i class="fa fa-edit"></i>
    </a>

    <a class='btn btn-danger btn-xs' wire:click="deleteRecord({{ $recordId }})"
       onclick="confirm('Are you sure you want to remove this Record?') || event.stopImmediatePropagation()">
        <i class="fa fa-trash"></i>
    </a>
</div>
