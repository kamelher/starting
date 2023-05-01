<div class='btn-group'>
    @permission('view.mails')
    <a href="#popUp" href="{{ $showUrl }}"
       class='btn btn-default btn-xs' onclick="loadeditform('{{ $showUrl }}', '  {{__('crud.show') . ' ' . $title }}')">
        <i class="fa fa-eye"></i> View Mail
    </a>
    @endpermission


    @permission('send.mails')
    <a href="#popUp" href="{{ $sendUrl }}"
       class='btn btn-info btn-xs' onclick="loadeditform('{{ $sendUrl }}', '  {{__('crud.send') . ' ' . $title }}')">
        <i class="fa fa-mail-bulk"></i> Send Mail
    </a>
    @endpermission


    @permission('edit.mails')
    <a href="#popUp" href="{{ $editUrl }}"
        class='btn btn-warning btn-xs' onclick="loadeditform('{{ $editUrl }}', '{{__('crud.edit') . ' ' . $title }}')">
        <i class="fa fa-edit"></i> Edit Mail
    </a>
    @endpermission

    @permission('delete.mails')
    <a class='btn btn-dark btn-xs' wire:click="deleteRecord({{ $recordId }})"
       onclick="confirm('Are you sure you want to remove this Record?') || event.stopImmediatePropagation()">
        <i class="fa fa-trash"></i> Delete Mail
    </a>
    @endpermission
</div>
