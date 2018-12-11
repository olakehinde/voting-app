@extends('layouts.election-template')

@section('content')
    <div class="text-center" style="margin-top: 50px;">
        <h1>Vote a Candidate</h1>
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
                                        <a href="{{route('nominations.vote', ['nomination_id'=>$nomination->id, 'category_id'=>$nomination->category_id])}}" class="btn btn-success btn-block">Vote</a>

                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                        @endforeach

                        <div class="col-md-4 about-grid">
                            <div class="about-grid1">
                                <figure class="thumb">
                                    <img src="{{ asset('election-template/images/p3.jpg') }}" alt=" " class="img-responsive" />
                                    <figcaption class="caption">
                                        <h3><a href="#">Laura Williums</a></h3>
                                        <span>Joint Secretary.</span>
                                        <p> It was popularised in the 1960s with the release of Letraset sheets.</p>
                                        <ul>
                                            <li><a href="#" class="f1"></a></li>
                                            <li><a href="#" class="f2"></a></li>
                                            <li><a href="#" class="f3"></a></li>
                                        </ul>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                        <div class="col-md-4 about-grid">
                            <div class="about-grid1">
                                <figure class="thumb">
                                    <img src="{{ asset('election-template/images/p2.jpg') }}" alt=" " class="img-responsive" />
                                    <figcaption class="caption">
                                        <h3><a href="#">Michael Andrew</a></h3>
                                        <span>Secretary.</span>
                                        <p> It was popularised in the 1960s with the release of Letraset sheets.</p>
                                        <ul>
                                            <li><a href="#" class="f1"></a></li>
                                            <li><a href="#" class="f2"></a></li>
                                            <li><a href="#" class="f3"></a></li>
                                        </ul>
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
    <!-- //banner-bottom -->
@endsection
