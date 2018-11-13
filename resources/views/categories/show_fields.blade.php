<div class="col-md-2">
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

<div class="col-md-10">
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#nominate" data-toggle="tab">Nominate</a></li>

          @if(Auth::user()->role_id < 3)
          <li><a href="#nominations" data-toggle="tab">Nominees List</a></li>
          @endif
        </ul>
        
        <div class="tab-content">
            <div class="active tab-pane" id="nominate">
                <!-- show nomination form if user has not nominated any candidate for this category before -->
                @if(!isset($hasNominatedBefore) || $hasNominatedBefore === 0)
                    <div class="row">
                        {!! Form::open(['route' => 'nominations.store']) !!}

                            @include('nominations.fields')

                        {!! Form::close() !!}
                    </div>
                @else
                    <!-- show the nominated candidate's details if user has nominated before -->
                    <div class="col-md-6 offset-3">
                        <h4>You have nominated {{ $nominatedCandidate->name }} for {{ $category->name }} category</h4>
                        <div class="box box-widget widget-user">
                            <!-- Add the bg color to the header using any of the bg-* classes -->
                            <div class="widget-user-header bg-aqua-active">
                              <h3 class="widget-user-username">{{$nominatedCandidate->name}}</h3>
                              <h5 class="widget-user-desc">{{$nominatedCandidate->occupation}}</h5>
                            </div>

                            <div class="box-footer">
                                <div class="row">
                                    <div class="col-sm-12 border-right">
                                      <div class="description-block">
                                        <h5 class="description-header">Bio</h5>
                                        <span class="description-text">{{$nominatedCandidate->bio}}</span>
                                      </div>
                                      <!-- /.description-block -->
                                    </div>
                                </div>
                                <!-- /.row -->

                                <div class="box-footer no-padding">
                                  <ul class="nav nav-stacked">
                                    <li><a href="#">Projects <span class="pull-right badge bg-blue">31</span></a></li>
                                    <li><a href="#">Tasks <span class="pull-right badge bg-aqua">5</span></a></li>
                                    <li><a href="#">Completed Projects <span class="pull-right badge bg-green">12</span></a></li>
                                    <li> Joined <span class="pull-right">{{$nominatedCandidate->created_at->format('M, Y') }}</span></li>
                                  </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end candidate's details here -->

                @endif
            </div>
            <!-- /.tab-pane -->
            
            <div class="tab-pane" id="nominations">
                <!-- list of admin approved nominees -->
                <h3> Nominees</h3>

                @if(count($selectedNominations) > 0)
                <div class="box box-primary">
                    <div class="box-body">
                            @include('nominations.selected-nominees')
                    </div>
                </div>
                    @else
                    <p>No Approved Nominee yet</p>
                @endif

                @if(Auth::user()->role_id < 3)                
                <!-- list of all nominees -->
                <h3>All Nominees</h3>
                <p>This view is only accessible by the Admin</p>
                <div class="box box-primary">
                    <div class="box-body">
                            @include('nominations.table')
                    </div>
                </div>
                @endif
            </div>
            <!-- /.tab-pane -->
        </div>
        <!-- /.tab-content -->
    </div>
    <!-- /.nav-tabs-custom -->
</div>
<!-- /.col -->