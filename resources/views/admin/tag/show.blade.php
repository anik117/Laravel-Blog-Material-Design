@extends('layouts.backend.app')

@section('title', 'Tags')

@push('css')

@endpush

@section('content')
    <a href="{{ route('admin.tag.index') }}" class="btn btn-default btn-raised"><i class="material-icons">arrow_back</i></a>

    <div class="card">
        <div class="card-header card-header-icon" data-background-color="rose">
            <i class="material-icons">label</i>
        </div>
        <div class="card-content">
            <h4 class="card-title">Tag Details</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-content">
                    <h4 class="card-title">{{ $tag->name }}</h4>
                    <hr>
                    <p class="text-muted medium">Relates posts with this tag</p>
                    <div>
                        @if(count($tag->posts) > 0)
                            <ol>
                                @foreach($tag->posts as $post)
                                    <li><a href="{{ route('admin.post.show', $post->id) }}">{{ $post->title }}</a></li>
                                @endforeach
                            </ol>
                        @else
                            <p class="small text-muted">Nothing found</p>
                        @endif
                    </div>
                </div>
        </div>
    </div>
@endsection

@push('js')
@endpush
