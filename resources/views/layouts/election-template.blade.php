<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>VotingApp</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <!-- datetime picker library style -->
    

    <!-- for-mobile-apps -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <meta name="keywords" content="election voting app, laravel voting app, election app" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
    function hideURLbar(){ window.scrollTo(0,1); } </script>

    <!-- //for-mobile-apps -->
    <link href="{{asset('election-template/css/bootstrap.css')}}" rel="stylesheet" media="screen">
    
    <link href='//fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'>

    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>

    <link href="{{asset('election-template/css/style.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('election-template/css/flexslider.css')}}" rel="stylesheet" type="text/css" media="screen">

    <!---strat-slider---->
    <script type="text/javascript" src="{{asset('election-template/js/jquery-1.11.1.min.js')}}"></script>
    <!---//-slider---->
    
    @yield('css')
</head>

<body>
    <!-- header -->
    <div class="header_bg">
        <div class="container">
            <!-----start-header----->
            <div class="header">
                <div class="logo">
                    <a href="index.html"><img src="images/logo1.png" alt=" " /></a>
                </div>
                <nav class="navbar navbar-default">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    @if(!Auth::guest())
                    <div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li class="act"><a href="/">Home</a></li>
                            <li class="pull-right act"><a href="#">{{Auth::user()->name}}</a></li>
                        </ul>
                        <div class="pull-right" style="margin-top: 30px">
                            <a href="{!! url('/logout') !!}" class="btn btn-default btn-flat"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Sign out
                            </a>
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </div><!-- /.navbar-collapse -->
                    @else
                    <ul class="nav navbar-nav">
                            <li class="act"><a href="/">Home</a></li>
                        </ul>
                    @endif    
                    
                </nav>
            </div>
        </div>
    </div>
    <!-- //end-header -->

    <div class="text-center">
        <strong>Nomination period: </strong> {{ $getViewSetting->nomination_start_date->format('D M, d') }} - {{ $getViewSetting->nomination_end_date->format('D M, d') }}
        &nbsp; 
        <strong>Voting period: </strong> {{ $getViewSetting->voting_start_date->format('D M, d') }} - {{ $getViewSetting->voting_end_date->format('D M, d') }}
    </div>

    @yield('content')

    <!-- scroll_top_btn -->
    <script type="text/javascript" src="{{asset('election-template/js/move-top.js')}}"></script>
    <script type="text/javascript" src="{{asset('election-template/js/easing.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
        
            var defaults = {
                containerID: 'toTop', // fading element id
                containerHoverID: 'toTopHover', // fading element hover id
                scrollSpeed: 1200,
                easingType: 'linear' 
            };
            
            
            $().UItoTop({ easingType: 'easeOutQuart' });
            
        });
    </script>

    <a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
    <!--end scroll_top_btn -->

    <!-- for bootstrap working -->
    <script type="text/javascript" src="{{asset('election-template/js/bootstrap-3.1.1.min.js')}}"></script>
    <!-- //for bootstrap working -->

    @yield('scripts')
</body>
</html>