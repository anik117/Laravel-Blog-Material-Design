@extends('layouts.frontend.app')

@section('title', 'Home')

@push('css')
@endpush

@section('content')

    <div class="main">
        <div class="container">
            <div class="section">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3 text-center">
                        <ul class="nav nav-pills nav-pills-rose">
                            <li class="active"><a href="#pill1" data-toggle="tab">All</a></li>
                            <li><a href="#pill2" data-toggle="tab">World</a></li>
                            <li><a href="#pill3" data-toggle="tab">Arts</a></li>
                            <li><a href="#pill4" data-toggle="tab">Tech</a></li>
                            <li><a href="#pill5" data-toggle="tab">Business</a></li>
                        </ul>
                        <div class="tab-content tab-space">
                            <div class="tab-pane active" id="pill1">

                            </div>
                            <div class="tab-pane" id="pill2">

                            </div>
                            <div class="tab-pane" id="pill3">

                            </div>
                            <div class="tab-pane" id="pill4">

                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-md-4">
                        <div class="card card-blog">
                            <div class="card-image">
                                <a href="">
                                    <img class="img" src="{{ asset('assets/frontend/img/examples/card-blog2.jpg') }}">
                                </a>
                                <div class="colored-shadow" style="background-image: url(&quot;assets/img/examples/card-blog2.jpg&quot;); opacity: 1;"></div></div>

                            <div class="card-content">
                                <h6 class="category text-success">Legal</h6>

                                <h4 class="card-title">
                                    <a href="#pablo">5 Common Legal Mistakes That Can Trip-Up Your Startup</a>
                                </h4>
                                <p class="card-description">
                                    Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                                </p>
                                <div class="footer">
                                    <div class="author">
                                        <a href="#pablo">
                                            <img src="{{ asset('assets/frontend/img/faces/marc.jpg') }}" alt="..." class="avatar img-raised">
                                            <span>Mike John</span>
                                        </a>
                                    </div>
                                    <div class="stats">
                                        <i class="material-icons">favorite</i> 30 ·
                                        <i class="material-icons">visibility</i> 100 ·
                                        <i class="material-icons">chat_bubble</i> 45
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card card-blog">
                            <div class="card-image">
                                <a href="">
                                    <img class="img" src="{{ asset('assets/frontend/img/examples/card-blog2.jpg') }}">
                                </a>
                                <div class="colored-shadow" style="background-image: url(&quot;assets/img/examples/card-blog2.jpg&quot;); opacity: 1;"></div></div>

                            <div class="card-content">
                                <h6 class="category text-success">Legal</h6>

                                <h4 class="card-title">
                                    <a href="#pablo">5 Common Legal Mistakes That Can Trip-Up Your Startup</a>
                                </h4>
                                <p class="card-description">
                                    Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                                </p>
                                <div class="footer">
                                    <div class="author">
                                        <a href="#pablo">
                                            <img src="{{ asset('assets/frontend/img/faces/marc.jpg') }}" alt="..." class="avatar img-raised">
                                            <span>Mike John</span>
                                        </a>
                                    </div>
                                    <div class="stats">
                                        <i class="material-icons">favorite</i> 30 ·
                                        <i class="material-icons">visibility</i> 100 ·
                                        <i class="material-icons">chat_bubble</i> 45
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card card-blog">
                            <div class="card-image">
                                <a href="">
                                    <img class="img" src="{{ asset('assets/frontend/img/examples/card-blog2.jpg') }}">
                                </a>
                                <div class="colored-shadow" style="background-image: url(&quot;assets/img/examples/card-blog2.jpg&quot;); opacity: 1;"></div></div>

                            <div class="card-content">
                                <h6 class="category text-success">Legal</h6>

                                <h4 class="card-title">
                                    <a href="#pablo">5 Common Legal Mistakes That Can Trip-Up Your Startup</a>
                                </h4>
                                <p class="card-description">
                                    Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                                </p>
                                <div class="footer">
                                    <div class="author">
                                        <a href="#pablo">
                                            <img src="{{ asset('assets/frontend/img/faces/marc.jpg') }}" alt="..." class="avatar img-raised">
                                            <span>Mike John</span>
                                        </a>
                                    </div>
                                    <div class="stats">
                                        <i class="material-icons">favorite</i> 30 ·
                                        <i class="material-icons">visibility</i> 100 ·
                                        <i class="material-icons">chat_bubble</i> 45
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="text-center">
                <button type="button" class="btn btn-rose">Load more</button>
            </div>

            <div class="section-space"></div>

            {{--<div class="section">--}}
                {{--<h3 class="title text-center">You may also be interested in</h3>--}}
                {{--<br />--}}
                {{--<div class="row">--}}
                    {{--<div class="col-md-4">--}}
                        {{--<div class="card card-plain card-blog">--}}
                            {{--<div class="card-image">--}}
                                {{--<a href="#pablo">--}}
                                    {{--<img class="img img-raised" src="../assets/img/bg5.jpg" />--}}
                                {{--</a>--}}
                            {{--</div>--}}

                            {{--<div class="card-content">--}}
                                {{--<h6 class="category text-info">Enterprise</h6>--}}
                                {{--<h4 class="card-title">--}}
                                    {{--<a href="#pablo">Autodesk looks to future of 3D printing with Project Escher</a>--}}
                                {{--</h4>--}}
                                {{--<p class="card-description">--}}
                                    {{--Like so many organizations these days, Autodesk is a company in transition. It was until recently a traditional boxed software company selling licenses.<a href="#pablo"> Read More </a>--}}
                                {{--</p>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="col-md-4">--}}
                        {{--<div class="card card-plain card-blog">--}}
                            {{--<div class="card-image">--}}
                                {{--<a href="#pablo">--}}
                                    {{--<img class="img img-raised" src="../assets/img/examples/blog5.jpg" />--}}
                                {{--</a>--}}
                            {{--</div>--}}
                            {{--<div class="card-content">--}}
                                {{--<h6 class="category text-success">--}}
                                    {{--Startups--}}
                                {{--</h6>--}}
                                {{--<h4 class="card-title">--}}
                                    {{--<a href="#pablo">Lyft launching cross-platform service this week</a>--}}
                                {{--</h4>--}}
                                {{--<p class="card-description">--}}
                                    {{--Like so many organizations these days, Autodesk is a company in transition. It was until recently a traditional boxed software company selling licenses.<a href="#pablo"> Read More </a>--}}
                                {{--</p>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="col-md-4">--}}
                        {{--<div class="card card-plain card-blog">--}}
                            {{--<div class="card-image">--}}
                                {{--<a href="#pablo">--}}
                                    {{--<img class="img img-raised" src="../assets/img/examples/blog6.jpg" />--}}
                                {{--</a>--}}
                            {{--</div>--}}

                            {{--<div class="card-content">--}}
                                {{--<h6 class="category text-danger">--}}
                                    {{--<i class="material-icons">trending_up</i> Enterprise--}}
                                {{--</h6>--}}
                                {{--<h4 class="card-title">--}}
                                    {{--<a href="#pablo">6 insights into the French Fashion landscape</a>--}}
                                {{--</h4>--}}
                                {{--<p class="card-description">--}}
                                    {{--Like so many organizations these days, Autodesk is a company in transition. It was until recently a traditional boxed software company selling licenses.<a href="#pablo"> Read More </a>--}}
                                {{--</p>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}

            {{--</div>--}}

        </div>

        <div class="team-5 section-image" style="background-image: url('{{ asset('assets/frontend/img/bg10.jpg') }}')">

            <div class="container">
                <div class="row">

                    <div class="col-md-6">
                        <div class="card card-profile card-plain">
                            <div class="col-md-5">
                                <div class="card-image">
                                    <a href="#pablo">
                                        <img class="img" src="{{ asset('assets/frontend/img/faces/card-profile1-square.jpg') }}" />
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="card-content">
                                    <h4 class="card-title">Alec Thompson</h4>
                                    <h6 class="category text-muted">Author of the Month</h6>

                                    <p class="card-description">
                                        Don't be scared of the truth because we need to restart the human foundation in truth...
                                    </p>

                                    <div class="footer">
                                        <a href="#pablo" class="btn btn-just-icon btn-simple btn-white"><i class="fa fa-twitter"></i></a>
                                        <a href="#pablo" class="btn btn-just-icon btn-simple btn-white"><i class="fa fa-facebook-square"></i></a>
                                        <a href="#pablo" class="btn btn-just-icon btn-simple btn-white"><i class="fa fa-google"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card card-profile card-plain">
                            <div class="col-md-5">
                                <div class="card-image">
                                    <a href="#pablo">
                                        <img class="img" src="{{ asset('assets/frontend/img/faces/card-profile1-square.jpg') }}" />
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="card-content">
                                    <h4 class="card-title">Kendall Andrew</h4>
                                    <h6 class="category text-muted">Author of the Week</h6>

                                    <p class="card-description">
                                        Don't be scared of the truth because we need to restart the human foundation in truth...
                                    </p>

                                    <div class="footer">
                                        <a href="#pablo" class="btn btn-just-icon btn-simple btn-white"><i class="fa fa-linkedin"></i></a>
                                        <a href="#pablo" class="btn btn-just-icon btn-simple btn-white"><i class="fa fa-facebook-square"></i></a>
                                        <a href="#pablo" class="btn btn-just-icon btn-simple btn-white"><i class="fa fa-dribbble"></i></a>
                                        <a href="#pablo" class="btn btn-just-icon btn-simple btn-white"><i class="fa fa-google"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>

@endsection

@push('js')
@endpush

