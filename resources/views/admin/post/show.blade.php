@extends('layouts.backend.app')

@section('title', 'Posts')

@push('css')

@endpush

@section('content')
    <a href="{{ route('admin.post.index') }}" class="btn btn-default btn-raised"><i class="material-icons">arrow_back</i></a>

    @if($post->is_approved == false)
        <button class="btn btn-rose btn-raised pull-right">
            <i class="material-icons">done</i> Approve
        </button>
    @else
        <button class="btn btn-success btn-raised pull-right" disabled>
            Approved
        </button>
    @endif

    <div class="card">
        <div class="card-header card-header-icon" data-background-color="rose">
            <i class="material-icons">library_books</i>
        </div>
        <div class="card-content">
            <h4 class="card-title">Post Details</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-content">
                    <h4 class="card-title">
                        {{ $post->title }}
                    </h4>
                    <h5><small>Posted by <strong><a href="#">{{ $post->user->name }}</a></strong> on {{ $post->created_at->toFormattedDateString() }}</small></h5>
                    <hr>
                    <div>
                        {!! $post->body !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-content">
                    <h4 class="card-title">Categories</h4>
                    <hr>
                    <div>
                        @foreach($post->categories as $category)
                            <span class="tag label label-rose">{{ $category->name }}</span>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-content">
                    <h4 class="card-title">Tags</h4>
                    <hr>
                    <div>
                        @foreach($post->tags as $tag)
                            <span class="tag label label-primary">{{ $tag->name }}</span>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-content">
                    <h4 class="card-title">Featured Image</h4>
                    <hr>
                    <div>
                        <img class="img-responsive thumbnail" src="{{ Storage::disk('public')->url('post/'.$post->image) }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
    <script>
        tinymce.init({
            selector: '#ta'
        });
    </script>
@endpush
