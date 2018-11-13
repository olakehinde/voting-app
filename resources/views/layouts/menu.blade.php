<li class="{{ Request::is('categories*') ? 'active' : '' }}">
    <a href="{!! route('categories.index') !!}"><i class="fa fa-edit"></i><span>Categories</span></a>
</li>

<li class="{{ Request::is('nominations*') ? 'active' : '' }}">
    <a href="{!! route('nominations.index') !!}"><i class="fa fa-edit"></i><span>Nominations</span></a>
</li>

<li class="{{ Request::is('votings*') ? 'active' : '' }}">
    <a href="{!! route('votings.index') !!}"><i class="fa fa-edit"></i><span>Votings</span></a>
</li> 

@if(Auth::user()->role_id < 3)
	<li class="divider" style="padding-left: 20px; color:grey">MODERATOR</li>
	<li class="{{ Request::is('users*') ? 'active' : '' }}">
	    <a href="{!! route('users.index') !!}"><i class="fa fa-edit"></i><span>Users</span></a>
	</li>

	@if(Auth::user()->role_id == 1)
	<li class="divider" style="padding-left: 20px; color:grey">ADMIN</li>
	<li class="{{ Request::is('roles*') ? 'active' : '' }}">
	    <a href="{!! route('roles.index') !!}"><i class="fa fa-edit"></i><span>Roles</span></a>
	</li>

	<li class="{{ Request::is('settings*') ? 'active' : '' }}">
	    <a href="{!! route('settings.index') !!}"><i class="fa fa-edit"></i><span>Settings</span></a>
	</li>
	@endif
@endif




<li class="{{ Request::is('nominationUsers*') ? 'active' : '' }}">
    <a href="{!! route('nominationUsers.index') !!}"><i class="fa fa-edit"></i><span>Nomination Users</span></a>
</li>

