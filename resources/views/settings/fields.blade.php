<div class="container-fluid">
    <!-- Nomination Start Date Field -->
    <div class="form-group col-sm-6">
        <label for="nomination_start_date" class="col-md-3 control-label">Nomination Start Date:</label>
        <div class="input-group date form_datetime col-md-9" data-date="1979-09-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="nomination_start_date">
            <input class="form-control" size="16" type="text" value="" readonly name="nomination_start_date">
            <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
            <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
        </div>
        <input type="hidden" id="nomination_start_date" value="" /><br/>
    </div>

    <!-- Nomination End Date Field -->
    <div class="form-group col-sm-6">
        <label for="nomination_end_date" class="col-md-3 control-label">Nomination End Date:</label>
        <div class="input-group date form_datetime col-md-9" data-date="1979-09-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="nomination_end_date">
            <input class="form-control" size="16" type="text" value="" readonly name="nomination_end_date">
            <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
            <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
        </div>
        <input type="hidden" id="nomination_start_date" value="" /><br/>
    </div>

    <!-- Voting Start Date Field -->
    <div class="form-group col-sm-6">
        <label for="voting_start_date" class="col-md-3 control-label">Voting Start Date:</label>
        <div class="input-group date form_datetime col-md-9" data-date="1979-09-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="voting_start_date">
            <input class="form-control" size="16" type="text" value="" readonly name="voting_start_date">
            <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
            <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
        </div>
        <input type="hidden" id="voting_start_date" value="" /><br/>
    </div>

    <!-- Voting End Date Field -->
    <div class="form-group col-sm-6">
        <label for="voting_end_date" class="col-md-3 control-label">Voting End Date:</label>
        <div class="input-group date form_datetime col-md-9" data-date="1979-09-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="voting_end_date">
            <input class="form-control" size="16" type="text" value="" readonly name="voting_end_date">
            <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
            <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
        </div>
        <input type="hidden" id="voting_end_date" value="" /><br/>
    </div>

    <!-- Submit Field -->
    <div class="form-group pull-right">
        {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
        <a href="{!! route('settings.index') !!}" class="btn btn-danger">Cancel</a>
    </div>
</div>