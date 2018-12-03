<div class="box">
    <!-- /.box-header -->
    <div class="box-body">
        <div id="example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
            <div class="row">
                <div class="col-sm-6 pull-right">
                    <div id="example_filter" class="dataTables_filter">
                        <label>Search:<input type="search" class="form-control input-sm" aria-controls="example">
                        </label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <table id="example" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example_info">
                        <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 182.467px;" aria-sort="ascending" aria-label="sort column descending">Name
                                </th>

                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 225.017px;" aria-label="sort column ascending">Email
                                </th>

                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 198.733px;" aria-label="sort column ascending">Role
                                </th>
                                
                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 155.9px;" aria-label="sort column ascending">Action
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($users as $user)
                            <tr role="row" class="odd">
                              <td class="sorting_1">{!! $user->name !!}</td>
                              <td>{!! $user->email !!}</td>
                              <td>{!! $user->role['name'] !!}</td>
                              <td>
                                {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
                                <div class='btn-group'>
                                    <a href="{!! route('users.show', [$user->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                                    <a href="{!! route('users.edit', [$user->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                                </div>
                                {!! Form::close() !!}
                              </td>
                            </tr>
                            @endforeach
                        </tbody>

                        <tfoot>
                            <tr>
                                <th rowspan="1" colspan="1">Rendering engine</th>
                                <th rowspan="1" colspan="1">Browser</th>
                                <th rowspan="1" colspan="1">Platform(s)</th>
                                <th rowspan="1" colspan="1">Engine version</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            {{$users->links()}}
        </div>
    </div>
    <!-- /.box-body -->
</div>