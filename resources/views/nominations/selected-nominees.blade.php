@foreach($selectedNominations as $nomination)

    <div class="col-md-4 offset-3">
        <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-aqua-active">
              <h3 class="widget-user-nominationname">{{$nomination->name}}</h3>
              <h5 class="widget-user-desc">{{$nomination->email}}</h5>
            </div>

            <div class="widget-user-image">
              <img class="img-circle" src="{{$nomination->avatar}}" alt="{{$nomination->name}}">
            </div>

            <div class="box-footer">
                <div class="row">
                    <div class="col-sm-12">
                      <div class="description-block">
                        <h5 class="description-header">Gender</h5>
                        <span class="description-text">{{$nomination->gender}}</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                </div>
                <!-- /.row -->

                <div class="box-footer no-padding">
                    <ul class="nav nav-stacked">
                        <li><a href="#"><strong>Bio</strong><span class="pull-right">{{$nomination->bio }}</span></a></li>
                        <li><a href="#"><strong>Category</strong><span class="pull-right">{{$nomination->category['name'] }}</span></a></li>
                        <li><a href="#"><strong>Occupation</strong><span class="pull-right">{{$nomination->occupation }}</span></a></li>
                        <li><a href="#"><strong>Won ?</strong><span class="pull-right">
                            @if($nomination->is_won == true)
                            <p>Yes</p>
                            @else
                            <p>No</p>
                            @endif
                            </span></a>
                        </li>


                        @if(Auth::user()->role_id < 3)
                            <li><a href="#"><strong>Nominations</strong><span class="pull-right">{{$nomination->no_of_nominations }}</span></a></li>
                            <li><a href="#"><strong>Nominated By</strong><span class="pull-right">{{$nomination->user['name']}}</span></a></li>

                            <li><a href="#"><strong>Reasons for Nomination</strong><span class="pull-right">{{$nomination->reasons_for_nomination}}</span></a></li>
                           
                            <li><a href="#"><strong>Nominated</strong><span class="pull-right">{{$nomination->created_at->format('M, Y')}}</span></a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>



@endforeach