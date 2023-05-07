<div class='btn-group'>
    @permission('view.mails')
    <a href="#popUp" href="{{ $showUrl }}"
       class='btn btn-default btn-xs' onclick="loadeditform('{{ $showUrl }}', '  {{__('crud.show') . ' ' . $title }}')">
        <i class="fa fa-eye"></i> View Mail
    </a>
    @endpermission

    @permission('view.mails')
    <a href="#popUp" href="{{ $attachUrl }}"
       class='btn btn-default btn-xs' onclick="loadeditform('{{ $attachUrl }}', '  {{__('crud.show') . ' ' . $title }}')">
        <i class="fa fa-plus"></i> Attach to Folder
    </a>
    @endpermission
</div>
