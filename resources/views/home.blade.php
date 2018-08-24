@extends('layouts.frontend.app')

@section('title', 'Home')

@push('css')
    <style>
        .card .card-image .wrapper img {
            height: 200px;
            object-fit: cover;
        }

        .h-100 {
            height: 100% !important;
        }

        a .material-icons {
             vertical-align: top;
        }

        .card .footer .stats a {
            color: #999;
        }

        .favorite {
            color: #e91e63 !important;
        }
    </style>
@endpush

@section('content')

    <div class="main">
        <div class="container">
            <div class="section">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3 text-center">
                        <ul class="nav nav-pills nav-pills-rose" style="padding-left: 1px !important;">
                            @foreach($categories as $category)
                                <li class=""><a href="" data-toggle="tab">{{ $category->name }}</a></li>
                            @endforeach
                        </ul>
                        <div class="tab-content tab-space">
                            <div class="tab-pane active" id="">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">

                    @foreach($posts as $post)
                        <div class="col-md-4">
                            <div class="card card-blog h-100">
                                <div class="card-image">
                                    <div class="wrapper" style="height: 200px;">
                                        @if(!($post->image == 'default.png'))
                                            <a href="">
                                                <img class="img" src="{{ Storage::disk('public')->url('post/'.$post->image) }}" alt="{{ $post->title }}">
                                            </a>
                                        @else
                                            <a href="">
                                                <img class="img" src="{{ asset('assets/backend/img/image_placeholder.jpg') }}" alt="{{ $post->title }}">
                                            </a>
                                        @endif
                                    </div>

                                    <div class="colored-shadow" style="background-image: url({{ Storage::disk('public')->url('post/'.$post->image)}}); opacity: 1;"></div>
                                </div>

                                <div class="card-content">
                                    <h6 class="category text-rose"><small>Published on</small> {{ $post->created_at->toFormattedDateString() }}</h6>

                                    <h5 class="card-title">
                                        <a href="">{{ str_limit($post->title, '30') }}</a>
                                    </h5>
                                    <div class="footer">
                                        <div class="author">
                                            <a href="#">
                                                @if(!($post->user->image == 'default.png'))
                                                    <a href="">
                                                        <img src="{{ Storage::disk('public')->url('profile/'.$post->user->image) }}" alt="{{ $post->user->name }}" class="avatar img-raised">
                                                    </a>
                                                @else
                                                    <a href="#">
                                                        <img src="{{ Storage::disk('public')->url('default.png') }}" alt="{{ $post->user->name }}" class="avatar img-raised">
                                                    </a>
                                                @endif
                                                <span>{{ $post->user->name }}</span>
                                            </a>
                                        </div>
                                        <div class="stats">
                                            @guest()
                                                <a href="javascript:void(0)" onclick="alert('Need to login first!')">
                                                    <i class="material-icons">favorite</i> {{ $post->favoriteToUsers->count() }} ·
                                                </a>
                                            @else
                                                <a class="{{ !Auth::user()->favoritePosts()->where('post_id', $post->id)->count() == 0 ? 'favorite' : ''}}" href="javascript:void(0)" onclick="document.getElementById('favorite-form-{{ $post->id }}').submit();">
                                                    <i class="material-icons">favorite</i> {{ $post->favoriteToUsers->count() }} ·
                                                </a>

                                                <form id="favorite-form-{{ $post->id }}" action="{{ route('post.favorite', $post->id) }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                            @endguest
                                            <i class="material-icons">visibility</i> {{ $post->view_count }} ·
                                            <a href="javascript:void(0)"><i class="material-icons">chat_bubble</i> 10 </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

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
                    @foreach($admins as $admin)
                        <div class="col-md-6">
                        <div class="card card-profile card-plain">
                            <div class="col-md-5">
                                <div class="card-image">
                                    <a href="">
                                        <img src="{{ Storage::disk('public')->url('profile/'.$admin->image) }}" alt="{{ $admin->name }}" class="avatar img-raised">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="card-content">
                                    <h4 class="card-title">{{ $admin->name }}</h4>
                                    <h6 class="category text-muted">Admin</h6>

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
                    @endforeach

                    @foreach($authors as $author)
                        <div class="col-md-6">
                            <div class="card card-profile card-plain">
                                <div class="col-md-5">
                                    <div class="card-image">
                                        <a href="">
                                            <img src="{{ Storage::disk('public')->url('profile/'.$author->image) }}" alt="{{ $author->name }}" class="avatar img-raised">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="card-content">
                                        <h4 class="card-title">{{ $author->name }}</h4>
                                        <h6 class="category text-muted">Author</h6>

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
                    @endforeach
                </div>

            </div>
        </div>

    </div>

@endsection

@push('js')
    <script type="text/javascript">
        // function loginAlert() {
        //
        // }
    </script>
@endpush

