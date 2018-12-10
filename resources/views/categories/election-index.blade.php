@extends('layouts.election-template')

@section('content')
    <div class="text-center" style="margin-top: 50px; margin-bottom: 50px">
        <h1>Choose a Category</h1>
    </div>
    <!-- banner-bottom1 -->
    <div class="banner-bottom1">
        <div class="banner-bottom1-grids">
            @foreach($categories as $category)
            <a href="{!! route('categories.show', [$category->id]) !!}">
                <div class="col-md-4 banner-bottom1-left banner-bottom1-left1">
                    <div class="banner-bottom1-lft">
                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                        <h3>{!! $category->name !!}</h3>
                        <!-- <p>Lorem Ipsum is therefore always free.</p> -->
                    </div>
                </div>

                {{--<div class="col-md-4 banner-bottom1-left">
                    <div class="banner-bottom1-lft">
                        <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>
                        <h3>Accessibility</h3>
                        <p>Lorem Ipsum is therefore always free.</p>
                    </div>
                </div>
                <div class="col-md-4 banner-bottom1-left banner-bottom1-left2">
                    <div class="banner-bottom1-lft">
                        <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                        <h3>Calendar</h3>
                        <p>Lorem Ipsum is therefore always free.</p>
                    </div>
                </div> --}}
            </a>
            @endforeach
            <div class="clearfix"> </div>
        </div>
    </div>
    <!-- //banner-bottom1 -->
@endsection

