<!-- Objet Field -->
<div class="col-sm-12">
    {!! Form::label('objet', __('models/mails.fields.objet').':') !!}
    <p>{{ $mail->objet }}</p>
</div>

<!-- Ref Field -->
<div class="col-sm-12">
    {!! Form::label('ref', __('models/mails.fields.ref').':') !!}
    <p>{{ $mail->ref }}</p>
</div>

<!-- Body Field -->
<div class="col-sm-12">
    {!! Form::label('body', __('models/mails.fields.body').':') !!}
    <p>{{ $mail->body }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', __('models/mails.fields.created_at').':') !!}
    <p>{{ $mail->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', __('models/mails.fields.updated_at').':') !!}
    <p>{{ $mail->updated_at }}</p>
</div>

