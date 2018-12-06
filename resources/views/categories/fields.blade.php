<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Icon name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('icon', 'Name of Icon (optional): ') !!}
    {!! Form::text('icon', null, ['class' => 'form-control']) !!}
</div>

<!-- Image Upload Field -->
<div class="form-group col-sm-6">
    {!! Form::label('image', 'Upload Category Image (optional): ') !!}
    {!! Form::file('image', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('categories.index') !!}" class="btn btn-default">Cancel</a>
</div>
