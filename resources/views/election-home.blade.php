@extends('layouts.election-template')

@section('content')
    <!-- banner -->
    <div class="banner">
        <div class="container">
            <!-- facebook login button -->
            <div class="text-center" style="margin-top: 10%">
                <a href="login/facebook" class="btn btn-primary btn-facebook btn-flat"><i class="fa fa-facebook"></i>Login with Facebook</a>
            </div>

            <section class="slider">
                <div class="flexslider">
                    <ul class="slides">
                        <li>
                            <div class="banner-info">
                                <div class="dummy_text">
                                    <h1>Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
                                        sed do eiusmod tempor incididunt ut labore et dolore magna 
                                        aliqua.
                                    </h1>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="banner-info">
                                <div class="dummy_text">
                                    <h1>Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
                                        sed do eiusmod tempor incididunt ut labore et dolore magna 
                                        aliqua.
                                    </h1>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="banner-info">
                                <div class="dummy_text">
                                    <h1>Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
                                        sed do eiusmod tempor incididunt ut labore et dolore magna 
                                        aliqua.
                                    </h1>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </section>
        </div>
    </div>
    <!-- //Banner -->
@endsection
