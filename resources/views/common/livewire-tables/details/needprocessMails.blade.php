<div class='btn-group'>
    @permission('view.mails')
    <a href="#popUp" href="{{ $showUrl }}"
       class='btn btn-default btn-xs' onclick="loadeditform('{{ $showUrl }}', '  {{__('crud.show') . ' ' . $title }}')">
        <i class="fa fa-eye"></i> View Mail
    </a>
    @endpermission

    @permission('process.mails')
    <a href="#popUp" href="{{ $processingUrl }}"
       class='btn btn-warning btn-xs' onclick="loadeditform('{{ $processingUrl }}', '  {{__('crud.process') . ' ' . $title }}')">
        <i class="fa fa-user-cog"></i> Process Mail
    </a>
    @endpermission
</div>
