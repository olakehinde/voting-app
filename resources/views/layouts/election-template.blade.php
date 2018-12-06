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