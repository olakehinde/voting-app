@extends('layouts.election-template')

@section('content')
{{$isWithinNominationPeriod. ' , '. $isWithinVotingPeriod}}
    @if($isWithinNominationPeriod == 'NO')
        <!-- contact -->
        <div class="contact">
            <div class="container col-md-offset-3">
                <h3>Nominate a Candidate</h3>
                <p class="nihil">Nominate a Tested, Trusted & Credible Candidate.</p>
                <div class="contact-grid">
                    <div class="col-md-7 contact-right">
                        <form>
                            <input type="text" placeholder="Name" required=" ">
                            <input type="text" placeholder="Email Address" required=" ">
                            <input type="text" placeholder="Phone Number" required=" ">
                            <input type="text" placeholder="Subject" required=" ">
                            <div class="clearfix"> </div>
                            <textarea placeholder="Type Your Text Here...." required=" "></textarea>
                            <input type="submit" value="Submit">
                            <input type="reset" value="Clear">
                        </form>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
        </div>
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
