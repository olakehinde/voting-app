<table class="table table-responsive" id="users-table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td><strong><a href="{!! route('users.show', [$user->id]) !!}">{!! $user->name !!}</a></strong></td>
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
</table>


<div class="box">
    <div class="box-header">
      <h3 class="box-title">Data Table With Full Features</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div id="example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
            <div class="row">
                <div class="col-sm-6">
                    <div class="dataTables_length" id="example_length"><label>Show <select name="example_length" aria-controls="example" class="form-control input-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label>
                    </div>
                </div>
                <div class="col-sm-6"><div id="example_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="example"></label></div>
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
                              <td>A</td>
                            </tr>
                        </tbody>

                        <tfoot>
                        <tr><th rowspan="1" colspan="1">Rendering engine</th><th rowspan="1" colspan="1">Browser</th><th rowspan="1" colspan="1">Platform(s)</th><th rowspan="1" colspan="1">Engine version</th><th rowspan="1" colspan="1">CSS grade</th></tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-5">
                    <div class="dataTables_info" id="example_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
                </div>
                <div class="col-sm-7">
                    <div class="dataTables_paginate paging_simple_numbers" id="example_paginate">
                        <ul class="pagination">
                            <li class="paginate_button previous disabled" id="example_previous">
                                <a href="#" aria-controls="example" data-dt-idx="0" tabindex="0">Previous</a>
                            </li>
                            <li class="paginate_button active">
                                <a href="#" aria-controls="example" data-dt-idx="1" tabindex="0">1</a>
                            </li>
                            <li class="paginate_button">
                                <a href="#" aria-controls="example" data-dt-idx="2" tabindex="0">2</a>
                            </li>
                            <li class="paginate_button">
                                <a href="#" aria-controls="example" data-dt-idx="3" tabindex="0">3</a>
                            </li>
                            <li class="paginate_button">
                                <a href="#" aria-controls="example" data-dt-idx="4" tabindex="0">4</a>
                            </li>
                            <li class="paginate_button">
                                <a href="#" aria-controls="example" data-dt-idx="5" tabindex="0">5</a>
                            </li>
                            <li class="paginate_button">
                                <a href="#" aria-controls="example" data-dt-idx="6" tabindex="0">6</a>
                            </li>
                            <li class="paginate_button next" id="example_next">
                                <a href="#" aria-controls="example" data-dt-idx="7" tabindex="0">Next</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.box-body -->
</div>