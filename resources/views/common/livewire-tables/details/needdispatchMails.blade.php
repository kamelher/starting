<div class='btn-group'>
    @permission('view.mails')
    <a href="#popUp" href="{{ $showUrl }}"
       class='btn btn-default btn-xs' onclick="loadeditform('{{ $showUrl }}', '  {{__('crud.show') . ' ' . $title }}')">
        <i class="fa fa-eye"></i> View Mail
    </a>
    @endpermission

    @permission('dispatch.mails')
    <a href="#popUp" href="{{ $SendProcessingUrl }}"
       class='btn btn-danger btn-xs' onclick="loadeditform('{{$SendProcessingUrl }}', '  {{__('crud.process') . ' ' . $title }}')">
        <i class="fa fa-mail-forward"></i> Send Processed Mail
    </a>
    @endpermission
</div>
