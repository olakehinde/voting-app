@extends('layouts.logged-out')

@section('content')
<div class="login-box">
    <div class="login-logo">
        <a href="{{ url('/home') }}"><b>
            @if($isWithinNominationPeriod == 'YES')
                Nomination
            @elseif($isWithinVotingPeriod == 'YES')
                Voting
            @else
                Voting and Nomination
            @endif
            </b>App</a>
    </div>

    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">
            @if($isWithinNominationPeriod == 'YES')
                Login to Nominate a Candidate
            @elseif($isWithinVotingPeriod == 'YES')
                Login to Vote
            @else
                Nomination or Voting dates have not been set.
            @endif
        </p>

        <div class="social-auth-links text-center">
            <a href="login/facebook" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i>Login with Facebook</a>
        </div>
    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

@endsection