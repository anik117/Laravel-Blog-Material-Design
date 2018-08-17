@extends('layouts.backend.app')

@section('title', 'Posts')

@push('css')

@endpush

@section('content')
    <a href="{{ route('admin.post.index') }}" class="btn btn-default btn-raised"><i class="material-icons">arrow_back</i></a>

    @if($post->is_approved == false)
        <form class="pull-right" id="confirm_approve-{{$post->id}}" onsubmit="approvePost({{$post->id}})" action="{{ route('admin.post.approve', $post->id) }}" method="POST" style="display: inline-block">
            @csrf
            @method('PUT')
            <button class="btn btn-rose btn-raised" type="submit">
                <i class="material-icons">done</i> Approve
            </button>
        </form>
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

    <script type="text/javascript">
        function approvePost (id) {
            event.preventDefault();
            swal({
                title: 'Are you sure?',
                text: "Please click confirm to approve this post",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, approve it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                reverseButtons: true,
                buttonsStyling: false
            }).then(function() {
                $("#confirm_approve-"+id).off("submit").submit();
                swal(
                    'Approved!',
                    'Post has been approved.',
                    'success'
                );
            }, function(dismiss) {
                // dismiss can be 'cancel', 'overlay',
                // 'close', and 'timer'
                if (dismiss === 'cancel') {
                    swal(
                        'Cancelled',
                        'Post remains pending',
                        'info'
                    );
                }
            });
        }
    </script>
@endpush
