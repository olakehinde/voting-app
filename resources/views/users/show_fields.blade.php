 <div class="col-md-6 offset-3">
    <div class="box box-widget widget-user">
        <!-- Add the bg color to the header using any of the bg-* classes -->
        <div class="widget-user-header bg-aqua-active">
          <h3 class="widget-user-username">{{$user->name}}</h3>
          <h5 class="widget-user-desc">{{$user->email}}</h5>
        </div>

        <div class="widget-user-image">
          <img class="img-circle" src="{{$user->avatar}}" alt="{{$user->name}}">
        </div>

        <div class="box-footer">
            <div class="row">
                <div class="col-sm-12 border-right">
                  <div class="description-block">
                    <h5 class="description-header">Role</h5>
                    <span class="description-text">{{$user->role['name']}}</span>
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
                <li> Joined <span class="pull-right">{{$user->created_at->format('M, Y') }}</span></li>
              </ul>
            </div>
        </div>
    </div>
</div>