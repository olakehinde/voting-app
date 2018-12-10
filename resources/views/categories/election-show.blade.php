@extends('layouts.election-template')

@section('content')
    <!-- banner-bottom -->
    <div class="banner-bottom">
        <div class="container">
            <article> 
                <div class="banner-wrap">
                    <div class="about-grids">
                        <div class="col-md-4 about-grid">
                            <div class="about-grid1">
                                <figure class="thumb">
                                    <img src="{{ asset('election-template/images/p1.jpg') }}" alt=" " class="img-responsive" />
                                    <figcaption class="caption">
                                        <h3><a href="#">James Cameron</a></h3>
                                        <span>Manager.</span>
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
