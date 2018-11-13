<table class="table table-responsive" id="nominations-table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Bio</th>
            <th>Gender</th>
            <th>Occupation</th>
            <th>Reasons For Nomination</th>
            <th>No Of Nominations</th>
            <th>Is Won</th>
            <th>Is Admin Selected</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($selectedNominations as $nomination)
        <tr>
            <td>{!! $nomination->name !!}</td>
            <td>{!! $nomination->bio !!}</td>
            <td>{!! $nomination->gender !!}</td>
            <td>{!! $nomination->occupation !!}</td>
            <td>{!! $nomination->reasons_for_nomination !!}</td>
            <td>{!! $nomination->no_of_nominations !!}</td>  
            <td>{!! $nomination->is_won !!}</td>
            <td>{!! $nomination->is_admin_selected !!}</td>
            <td>
                {!! Form::open(['route' => ['nominations.destroy', $nomination->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('nominations.show', [$nomination->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('nominations.edit', [$nomination->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>