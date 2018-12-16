<div class="col-md-12">
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">

            <!-- this view is only accesible to a normal user -->
            @if($isWithinNominationPeriod == 'YES')
                <li class="active"><a href="#nominate" data-toggle="tab">Nominate</a></li>
            @endif

            <!-- this view is only accesible to the admin. only admin can see the list of all nominees -->
                
                @if(Auth::user()->role_id < 3 || $isWithinVotingPeriod == 'YES')
                    <li><a href="#nominees" data-toggle="tab">
                    @if(Auth::user()->role_id < 3)
                        Nominees
                    @elseif(Auth::user()->role_id == 4)
                        Vote
                    @endif
                    </a></li>
                @endif
        </ul>
        
        <div class="tab-content">
            @if($isWithinNominationPeriod == 'YES')
            <div class="active tab-pane" id="nominate">
                <!-- show nomination form if user has not nominated any candidate for this category before -->
                @if(!isset($hasNominatedBefore) || $hasNominatedBefore === 0)
                    <div class="row">
                        {!! Form::open(['route' => 'nominations.store', 'enctype' => 'multipart/form-data']) !!}

                            @include('nominations.fields')

                        {!! Form::close() !!}
                    </div>
                @else
                    <!-- show the nominated candidate's details if user has nominated before -->
                    <div class="col-md-6 offset-3">
                        <h4>You have nominated {{ $nominatedCandidate->name }}</h4>
                        <div class="box box-widget widget-user">
                            <!-- Add the bg color to the header using any of the bg-* classes -->
                            <div class="widget-user-header bg-aqua-active">
                              <h3 class="widget-user-username">{{$nominatedCandidate->name}}</h3>
                              <h5 class="widget-user-desc">{{$nominatedCandidate->occupation}}</h5>
                            </div>

                            <div class="widget-user-image">
                                <img class="img-circle" src="{{ asset('storage/uploads/images/'. $nominatedCandidate->id.'/'.$nominatedCandidate->image)}}" alt="{{$nominatedCandidate->name}}">
                            </div>

                            <div class="box-footer">
                                <div class="row">
                                    <div class="col-sm-6 border-right">
                                        <div class="description-block">
                                        <h5 class="description-header">Gender</h5>
                                        <span class="description-text">{{$nominatedCandidate->gender}}</span>
                                        </div>
                                        <!-- /.description-block -->
                                    </div>

                                    <div class="col-sm-6 border-right">
                                      <div class="description-block">
                                        <h5 class="description-header">Nominations</h5>
                                        <span class="description-text">{{$nominatedCandidate->no_of_nominations}}</span>
                                      </div>
                                      <!-- /.description-block -->
                                    </div>
                                </div>
                                <!-- /.row -->

                                <div class="box-footer no-padding">
                                  <ul class="nav nav-stacked">
                                    <li><a href="#"><strong>Nominated</strong><span class="pull-right">{{$nominatedCandidate->created_at->format('M, Y') }}</span></a>
                                    </li>
                                    <li><a href="#"><strong>Bio</strong><span class="pull-right">{{$nominatedCandidate->bio }}</span></a></li>
                                    <li><a href="#"><strong>Occupation</strong><span class="pull-right">{{$nominatedCandidate->occupation }}</span></a></li>
                                    <li><a href="#"><strong>Why Nominate ?</strong><span class="pull-right">{{$nominatedCandidate->reasons_for_nomination }}</span></a></li>
                                  </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end candidate's details here -->

                @endif
            </div>
            @endif
            <!-- /.tab-pane -->
            
            <!-- Nominees tab pane. Only admin can access this at all times. Voters can only access during voting period -->
            @if(Auth::user()->role_id < 3 || $isWithinVotingPeriod == 'YES')
            <div class="tab-pane 
                @if(Auth::user()->role_id != 4 || $isWithinVotingPeriod == 'YES')
                    active
                @endif
                " id="nominees">

                <!-- list of admin approved nominees -->
                <h3> Approved Nominees</h3>

                @if(isset($selectedNominations))
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
            @endif
            <!-- End Nomination tab-pane -->

        </div>
        <!-- /.tab-content -->
    </div>
    <!-- /.nav-tabs-custom -->
</div>
<!-- /.col -->