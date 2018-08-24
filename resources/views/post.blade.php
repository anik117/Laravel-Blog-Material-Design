@extends('layouts.frontend.blank')

@section('title')
    {{ $post->title }}
@endsection

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

        .card-profile {
            text-align: left;
        }

        .page-header {
            height: 100vh;
        }

        .header-filter::before {
            background-color: rgba(0, 0, 0, 0.7);
        }

        .header-text {
            /*margin-top: 120px;*/
        }
    </style>
@endpush

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ Storage::disk('public')->url('post/'.$post->image) }}');">
        <div class="container">
            <div class="header-text text-center">
                <h1 class="title">{{ $post->title }}</h1>
                <h5>Written by <strong>{{ $post->user->name }}</strong> - {{ $post->created_at->diffForHumans() }}</h5>
            </div>
        </div>
    </div>

    <div class="main main-raised">
        <div class="container">
            <div class="section section-text">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <h3 class="title">{{ $post->title }}</h3>
                        <hr>
                    </div>

                    <div class="col-md-10 col-md-offset-1">
                        <p>{!! $post->body !!}</p>
                    </div>
                </div>
            </div>

            <div class="section section-blog-info">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="blog-tags">
                                    Tags:
                                    @foreach($post->tags as $tag)
                                        <span class="label label-rose">{{ $tag->name }}</span>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-md-6">
                                <a href="#pablo" class="btn btn-sm btn-google btn-round pull-right">
                                    <i class="fa fa-google"></i> 232
                                </a>
                                <a href="#pablo" class="btn btn-sm btn-twitter btn-round pull-right">
                                    <i class="fa fa-twitter"></i> 910
                                </a>
                                <a href="#pablo" class="btn btn-sm btn-facebook btn-round pull-right">
                                    <i class="fa fa-facebook-square"></i> 872
                                </a>

                            </div>
                        </div>

                        <hr />

                        <div class="card card-profile card-plain">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="card-avatar">
                                        <a href="">
                                            <img class="img" src="{{ Storage::disk('public')->url('profile/'.$post->user->image) }}">
                                        </a>
                                        <div class="ripple-container"></div></div>
                                </div>
                                <div class="col-md-8">
                                    <h4 class="card-title">{{ $post->user->name }}</h4>
                                    <p class="description">{{ $post->user->about }}</p>
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-rose pull-right btn-round">Follow</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="section section-comments">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="media-area">
                            <h3 class="title text-center">3 Comments</h3>
                            <div class="media">
                                <a class="pull-left" href="#pablo">
                                    <div class="avatar">
                                        <img class="media-object" src="../assets/img/faces/card-profile4-square.jpg" alt="..."/>
                                    </div>
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading">Tina Andrew <small>&middot; 7 minutes ago</small></h4>
                                    <h6 class="text-muted"></h6>

                                    <p>Chance too good. God level bars. I'm so proud of @LifeOfDesiigner #1 song in the country. Panda! Don't be scared of the truth because we need to restart the human foundation in truth I stand with the most humility. We are so blessed!</p>

                                    <div class="media-footer">
                                        <a href="#pablo" class="btn btn-primary btn-simple pull-right" rel="tooltip" title="Reply to Comment">
                                            <i class="material-icons">reply</i> Reply
                                        </a>
                                        <a href="#pablo" class="btn btn-danger btn-simple pull-right">
                                            <i class="material-icons">favorite</i> 243
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="media">
                                <a class="pull-left" href="#pablo">
                                    <div class="avatar">
                                        <img class="media-object" alt="Tim Picture" src="../assets/img/faces/card-profile1-square.jpg">
                                    </div>
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading">John Camber <small>&middot; Yesterday</small></h4>

                                    <p>Hello guys, nice to have you on the platform! There will be a lot of great stuff coming soon. We will keep you posted for the latest news.</p>
                                    <p> Don't forget, You're Awesome!</p>

                                    <div class="media-footer">
                                        <a href="#pablo" class="btn btn-primary btn-simple pull-right" rel="tooltip" title="Reply to Comment">
                                            <i class="material-icons">reply</i> Reply
                                        </a>
                                        <a href="#pablo" class="btn btn-default btn-simple pull-right">
                                            <i class="material-icons">favorite</i> 25
                                        </a>
                                    </div>
                                    <div class="media">
                                        <a class="pull-left" href="#pablo">
                                            <div class="avatar">
                                                <img class="media-object" alt="64x64" src="../assets/img/faces/card-profile4-square.jpg">
                                            </div>
                                        </a>
                                        <div class="media-body">
                                            <h4 class="media-heading">Tina Andrew <small>&middot; 12 Hours Ago</small></h4>

                                            <p>Hello guys, nice to have you on the platform! There will be a lot of great stuff coming soon. We will keep you posted for the latest news.</p>
                                            <p> Don't forget, You're Awesome!</p>

                                            <div class="media-footer">
                                                <a href="#pablo" class="btn btn-primary btn-simple pull-right" rel="tooltip" title="Reply to Comment">
                                                    <i class="material-icons">reply</i> Reply
                                                </a>
                                                <a href="#pablo" class="btn btn-default btn-simple pull-right">
                                                    <i class="material-icons">favorite</i> 2
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <h3 class="title text-center">Post your comment</h3>
                        <div class="media media-post">
                            <a class="pull-left author" href="#pablo">
                                <div class="avatar">
                                    <img class="media-object" alt="64x64" src="../assets/img/faces/card-profile6-square.jpg">
                                </div>
                            </a>
                            <div class="media-body">
                                <textarea class="form-control" placeholder="Write some nice stuff or nothing..." rows="6"></textarea>
                                <div class="media-footer">
                                    <a href="#pablo" class="btn btn-rose btn-round btn-wd pull-right">Post Comment</a>
                                </div>
                            </div>
                        </div> <!-- end media-post -->
                    </div>
                </div>
            </div>

        </div>
    </div>

    {{--Related Stories--}}
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="title text-center">Related Posts</h2>
                    <br />
                    <div class="row">
                        @foreach($randomPosts as $randomPost)
                                <div class="col-md-4">
                                    <div class="card card-blog h-100">
                                        <div class="card-image">
                                            <div class="wrapper" style="height: 200px;">
                                                @if(!($randomPost->image == 'default.png'))
                                                    <a href="{{ route('post.details', $randomPost->slug) }}">
                                                        <img class="img" src="{{ Storage::disk('public')->url('post/'.$randomPost->image) }}" alt="{{ $randomPost->title }}">
                                                    </a>
                                                @else
                                                    <a href="{{ route('post.details', $randomPost->slug) }}">
                                                        <img class="img" src="{{ asset('assets/backend/img/image_placeholder.jpg') }}" alt="{{ $randomPost->title }}">
                                                    </a>
                                                @endif
                                            </div>

                                            <div class="colored-shadow" style="background-image: url({{ Storage::disk('public')->url('post/'.$post->image)}}); opacity: 1;"></div>
                                        </div>

                                        <div class="card-content">
                                            <h6 class="category text-rose"><small>Published on</small> {{ $randomPost->created_at->toFormattedDateString() }}</h6>

                                            <h5 class="card-title">
                                                <a href="{{ route('post.details', $randomPost->slug) }}">{{ str_limit($randomPost->title, '30') }}</a>
                                            </h5>
                                            <div class="footer">
                                                <div class="author">
                                                    <a href="#">
                                                        @if(!($randomPost->user->image == 'default.png'))
                                                            <a href="">
                                                                <img src="{{ Storage::disk('public')->url('profile/'.$randomPost->user->image) }}" alt="{{ $post->user->name }}" class="avatar img-raised">
                                                            </a>
                                                        @else
                                                            <a href="#">
                                                                <img src="{{ Storage::disk('public')->url('default.png') }}" alt="{{ $randomPost->user->name }}" class="avatar img-raised">
                                                            </a>
                                                        @endif
                                                        <span>{{ $randomPost->user->name }}</span>
                                                    </a>
                                                </div>
                                                <div class="stats">
                                                    @guest()
                                                        <a href="javascript:void(0)" onclick="alert('Need to login first!')">
                                                            <i class="material-icons">favorite</i> {{ $randomPost->favoriteToUsers->count() }} ·
                                                        </a>
                                                    @else
                                                        <a class="{{ !Auth::user()->favoritePosts()->where('post_id', $randomPost->id)->count() == 0 ? 'favorite' : ''}}" href="javascript:void(0)" onclick="document.getElementById('favorite-form-{{ $randomPost->id }}').submit();">
                                                            <i class="material-icons">favorite</i> {{ $randomPost->favoriteToUsers->count() }} ·
                                                        </a>

                                                        <form id="favorite-form-{{ $randomPost->id }}" action="{{ route('post.favorite', $randomPost->id) }}" method="POST" style="display: none;">
                                                            @csrf
                                                        </form>
                                                    @endguest
                                                    <i class="material-icons">visibility</i> {{ $randomPost->view_count }} ·
                                                    <a href="javascript:void(0)"><i class="material-icons">chat_bubble</i> 10 </a>
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
    </div>
@endsection

@push('js')

@endpush
