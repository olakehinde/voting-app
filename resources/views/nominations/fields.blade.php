<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Bio Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bio', 'Bio:') !!}
    {!! Form::text('bio', null, ['class' => 'form-control']) !!}
</div>

<!-- Gender Field -->
<div class="form-group col-sm-6">
    <label for="gender">Gender</label>
    <select class="form-control" id="gender" name="gender">
        <option value="" selected="selected">Select</option>
        <option value="male">Male</option>
        <option value="female">Female</option>
    </select>
</div>

<!-- Occupation Field -->
<div class="form-group col-sm-6">
    {!! Form::label('occupation', 'Occupation:') !!}
    {!! Form::text('occupation', null, ['class' => 'form-control']) !!}
</div>

<!-- Reasons For Nomination Field -->
<div class="form-group col-sm-6">
    {!! Form::label('reasons_for_nomination', 'Reasons For Nomination:') !!}
    {!! Form::text('reasons_for_nomination', null, ['class' => 'form-control']) !!}
</div>

<!-- Category Id Field -->
@if(isset($category->id))
<div class="form-group col-sm-6">
    {!! Form::hidden('category_id', $category->id, ['class' => 'form-control']) !!}
</div>
@else
<div class="form-group col-sm-6">
    {!! Form::hidden('category_id', null, ['class' => 'form-control']) !!}
</div>
@endif


@if(Auth::user()->role_id < 3)

<!-- No Of Nominations Field -->
<div class="form-group col-sm-6">
    {!! Form::label('no_of_nominations', 'No Of Nominations:') !!}
    {!! Form::number('no_of_nominations', null, ['class' => 'form-control']) !!}
</div>

<!-- Is Won Field -->
<div class="form-group col-sm-6">
    {!! Form::label('is_won', 'Is Won:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('is_won', false) !!}
        {!! Form::checkbox('is_won', '1', null) !!} 1
    </label>
</div>

<!-- Is Admin Selected Field -->
<div class="form-group col-sm-6">
    {!! Form::label('is_admin_selected', 'Is Admin Selected:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('is_admin_selected', false) !!}
        {!! Form::checkbox('is_admin_selected', '1', null) !!} 1
    </label>
</div>
@endif

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
