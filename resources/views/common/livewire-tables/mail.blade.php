<div class='btn-group'>
    @permission('view.mails')
    <a href="#popUp" href="{{ $showUrl }}"
       class='btn btn-default ' onclick="loadeditform('{{ $showUrl }}', '  {{__('crud.show') . ' ' . $title }}')">
        <i class="fa fa-eye"></i> @lang('models/mails.button.view')

    </a>
    @endpermission


    @permission('send.mails')
    <a href="#popUp" href="{{ $sendUrl }}"
       class='btn btn-info ' onclick="loadeditform('{{ $sendUrl }}', '  {{__('crud.send') . ' ' . $title }}')">
        <i class="fa fa-mail-bulk"></i> @lang('models/mails.button.send')
    </a>
    @endpermission


    @permission('edit.mails')
    <a href="#popUp" href="{{ $editUrl }}"
        class='btn btn-warning ' onclick="loadeditform('{{ $editUrl }}', '{{__('crud.edit') . ' ' . $title }}')">
        <i class="fa fa-edit"></i>  @lang('models/mails.button.edit')
    </a>
    @endpermission

    @permission('delete.mails')
    <a class='btn btn-dark ' wire:click="deleteRecord({{ $recordId }})"
       onclick="confirm('Are you sure you want to remove this Record?') || event.stopImmediatePropagation()">
        <i class="fa fa-trash"></i>  @lang('models/mails.button.delete')
    </a>
    @endpermission
</div>
