@extends('layouts.election-template')

@section('content')
    @if($isWithinNominationPeriod == 'YES')
        VBKBKVNK
    @elseif($isWithinVotingPeriod == 'YES')
        <div class="text-center" style="margin-top: 50px;">
            <h1>Vote a Candidate</h1>
            @if(isset($checkVote))
            <small>You have Voted in this Category</small>
            @endif
        </div>
        <!-- banner-bottom -->
        <div class="banner-bottom">
            <div class="container">
                <article> 
                    <div class="banner-wrap">
                        <div class="about-grids">

                            @foreach($nominations as $nomination)
                            <div class="col-md-4 about-grid">
                                <br>
                                <div class="about-grid1">
                                    <figure class="thumb">
                                        <img style="max-height: 250px; min-height: 250px" src="{{ asset('storage/uploads/images/'.$nomination->id.'/'.$nomination->image) }}" alt="$nomination->name" class="img-responsive" />
                                        <figcaption class="caption">
                                            <h3><a href="#">{{ $nomination->name }}</a></h3>
                                            <span>{{ $nomination->occupation }}</span>
                                            <p>{{ $nomination->bio }}</p>

                                            <!-- add a vote button -->
                                            @if(!isset($checkVote))
                                                <a href="{{route('nominations.vote', ['nomination_id'=>$nomination->id, 'category_id'=>$nomination->category_id])}}" class="btn btn-success btn-block"><strong>Vote</strong></a>
                                            @elseif($checkVote['nomination_id'] == $nomination->id)
                                                <button class="btn btn-danger"><strong>You have Voted!</strong></button>
                                            @endif
                                        </figcaption>
                                    </figure>
                                </div>
                            </div>
                            @endforeach
                            <div class="clearfix"> </div>
                        </div>
                    </div>
                </article>
            </div>
        </div>
        <!-- //banner-bottom -->
    @endif
@endsection
