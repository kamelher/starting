<div class='btn-group'>
    @permission('view.mails')
    <a href="#popUp" href="{{ $showUrl }}"
       class='btn btn-default btn-xs' onclick="loadeditform('{{ $showUrl }}', '  {{__('crud.show') . ' ' . $title }}')">
        <i class="fa fa-eye"></i> View Mail
    </a>
    @endpermission

    @permission('record.mails')
    <a href="#popUp" href="{{ $recordUrl }}"
       class='btn btn-success btn-xs' onclick="loadeditform('{{ $recordUrl }}', '  {{__('crud.record') . ' ' . $title }}')">
        <i class="fa fa-registered"></i> record Mail
    </a>
    @endpermission

</div>
