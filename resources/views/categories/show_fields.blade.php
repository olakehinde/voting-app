<div class="col-md-3">
    <!-- Profile Image -->
    <div class="box box-primary">
        <div class="box-body box-profile">
          
            <h3 class="profile-username text-center">{!! $category->name !!}</h3>

            <p class="text-muted text-center">Last Updated: {!! $category->updated_at->format('D, M d, Y') !!}</p>

            <!-- <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Followers</b> <a class="pull-right">1,322</a>
                </li>
                <li class="list-group-item">
                  <b>Following</b> <a class="pull-right">543</a>
                </li>
                <li class="list-group-item">
                  <b>Friends</b> <a class="pull-right">13,287</a>
                </li>
            </ul>

            <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>
<!-- /.col -->

<div class="col-md-9">
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#nominate" data-toggle="tab">Nominate</a></li>
          <li><a href="#vote" data-toggle="tab">Vote</a></li>
          @if(Auth::user()->role_id < 3)
          <li><a href="#nominations" data-toggle="tab">Nominations</a></li>
          @endif
        </ul>
        
        <div class="tab-content">
            <div class="active tab-pane" id="nominate">
                <div class="row">
                    {!! Form::open(['route' => 'nominations.store']) !!}

                        @include('nominations.fields')

                    {!! Form::close() !!}
                </div>
            </div>
            <!-- /.tab-pane -->

            <div class="tab-pane" id="vote">
            Add Vote content here
            </div>
            <!-- /.tab-pane -->

            
            <div class="tab-pane" id="nominations">
            Add noinations content here
            </div>
            <!-- /.tab-pane -->
        </div>
        <!-- /.tab-content -->
    </div>
    <!-- /.nav-tabs-custom -->
</div>
<!-- /.col -->