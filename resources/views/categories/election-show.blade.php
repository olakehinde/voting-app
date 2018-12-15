@extends('layouts.election-template')

@section('content')
    @if($isWithinNominationPeriod == 'NO') //remember to change the check back to 'NO'
        @if(isset($hasNominatedBefore) && $hasNominatedBefore != 0)
            <div class="banner-bottom">
                <div class="container col-md-offset-3">
                    <h3><span class="glyphicon glyphicon-th-list" style="color: grey; font-size: 20px" aria-hidden="true"></span>
                        You have Nominated <strong>{{ $nominatedCandidate->name }}</strong>
                    </h3>
                    <p class="nihil">Under the <strong>{{ $category->name }}</strong> Category</p>
                    <article> 
                        <div class="banner-wrap">
                            <div class="about-grids">
                                <div class="col-md-4 about-grid">
                                    <br>
                                    <div class="about-grid1">
                                        <figure class="thumb">
                                            <img style="max-height: 250px; min-height: 250px" src="{{ asset('storage/uploads/images/'.$nominatedCandidate->id.'/'.$nominatedCandidate->image) }}" alt="$nominatedCandidate->name" class="img-responsive" />
                                            <figcaption class="caption">
                                                <h3><a href="#">{{ $nominatedCandidate->name }}</a></h3>
                                                <span>{{ $nominatedCandidate->occupation }}</span>
                                                <p>{{ $nominatedCandidate->bio }}</p>
                                            </figcaption>
                                        </figure>
                                    </div>
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        @endif

        @if(!isset($hasNominatedBefore) || $hasNominatedBefore === 0)
        <!-- Nomintion form -->
        <div class="contact">
            <div class="container col-md-offset-3">
                <h3>
                    <span class="glyphicon glyphicon-user" style="color: grey; font-size: 30px" aria-hidden="true"></span> 
                        Nominate a Candidate in the {{$category->name }} Category
                </h3>
                <p class="nihil">Nominate a Tested, Trusted & Credible Candidate.</p>
                <div class="contact-grid">
                    @include('adminlte-templates::common.errors')
                    <div class="col-md-7 contact-right">
                        <form method="post" action="{{route('nominations.store')}}" enctype="multipart/form-data">
                            <input type="text" name="name" placeholder="Enter Fullname (Surname first)" required="">
                            <input type="text" name="occupation" placeholder="Occupation">
                            <input type="text" name="reasons_for_nomination" placeholder="Why do you Nominate Candidate?">
                            <textarea name="bio" placeholder="Enter Candidate Biography here..."></textarea>

                            <div class="form-group col-sm-6" style="margin-top: 10px;">
                                <!-- Gender Field -->
                                <label for="gender">Gender</label>
                                <select id="gender" name="gender">
                                    <option value="" selected="selected">Select</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>

                            <div class="col-sm-6 form-group" style="margin-top: 10px;">
                                <label for="image">Upload Candidate Image</label>
                                <input type="file" name="image" id="image" required="">
                            </div>
                            
                            <!-- hidden field -->
                            <input type="hidden" name="category_id" value="{{$category->id}}">
                            {{ csrf_field() }}

                            <input class="col-sm-offset-3" type="submit" value="Submit">
                        </form>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
        </div>
        @endif
    @elseif($isWithinVotingPeriod == 'YES')
        @if(isset($selectedNominations))
        <div class="text-center" style="margin-top: 50px;">
            <h1>
                <span class="glyphicon glyphicon-thumbs-up" style="color: grey; font-size: 30px" aria-hidden="true"></span>
                 Vote a Candidate
            </h1>
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

                            @foreach($selectedNominations as $nomination)
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
        @endif
        <!-- //banner-bottom -->
    @endif
    <div class="text-center">
        @if(isset($previousCategory))
            <a href="/categories/{{$previousCategory->id}}" class="col-xm-5"><< Previous Category <span class="btn btn-primary">{{$previousCategory->name}}</span></a>
        @endif

        @if(isset($previousCategory) && isset($nextCategory))
            &nbsp; &nbsp; &nbsp;||&nbsp;&nbsp;&nbsp;
        @endif

        @if(isset($nextCategory))
            <a href="/categories/{{$nextCategory->id}}" class="col-xm-5">Next Category >> <span class="btn btn-primary">{{$nextCategory->name}}</span></a>
        @endif
    </div>
@endsection
