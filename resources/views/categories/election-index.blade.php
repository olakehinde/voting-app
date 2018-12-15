@extends('layouts.election-template')

@section('content')
    <div class="text-center" style="margin-top: 50px; margin-bottom: 50px">
        <h1><span class="glyphicon glyphicon-th-list" style="color: grey; font-size: 30px" aria-hidden="true"></span> Choose a Category</h1>
    </div>
    <!-- banner-bottom1 -->
    <div class="banner-bottom1">
        <div class="banner-bottom1-grids">
            @foreach($categories as $category)
            <a href="{!! route('categories.show', [$category->id]) !!}">
                <div class="col-md-4 banner-bottom1-left banner-bottom1-left1">
                    <div class="banner-bottom1-lft">
                        @if(isset($category->icon))
                        <span class="glyphicon {{$category->icon}}" aria-hidden="true"></span>
                        @else
                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                        @endif
                        <h3>{!! $category->name !!}</h3>
                    </div>
                </div>
            </a>
            @endforeach
            <div class="clearfix"> </div>
        </div>
    </div>
    <!-- //banner-bottom1 -->
@endsection

