<!-- Name Ar Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name_ar', __('models/services.fields.name_ar').':') !!}
    {!! Form::text('name_ar', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Name En Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name_en', __('models/services.fields.name_en').':') !!}
    {!! Form::text('name_en', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Thumbnail Field -->
<div class="form-group col-sm-6">
    {!! Form::label('thumbnail', __('models/services.fields.thumbnail').':') !!}
    {!! Form::text('thumbnail', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Abr Latin Field -->
<div class="form-group col-sm-6">
    {!! Form::label('abr_latin', __('models/services.fields.abr_latin').':') !!}
    {!! Form::text('abr_latin', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Abr Ar Field -->
<div class="form-group col-sm-6">
    {!! Form::label('abr_ar', __('models/services.fields.abr_ar').':') !!}
    {!! Form::text('abr_ar', null, ['class' => 'form-control', 'required']) !!}
</div>