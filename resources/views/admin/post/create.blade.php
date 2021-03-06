@extends('layouts.backend.app')

@section('title', 'Posts')

@push('css')

@endpush

@section('content')
    <form method="POST" action="{{ route('admin.post.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="rose">
                        <i class="material-icons">library_books</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">Create Post</h4>
                        <div class="form-group">
                            <label class="control-label">Post Title</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Enter post title.." required>
                        </div>

                        <div class="form-group">
                            <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                <div class="fileinput-new thumbnail">
                                    <img src="{{ asset('assets/backend/img/image_placeholder.jpg') }}" alt="image upload">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                <div>
                                    <span class="btn btn-rose btn-round btn-file">
                                        <span class="fileinput-new">Featured image</span>
                                        <span class="fileinput-exists">Change</span>
                                        <input type="file" name="image" required>
                                    </span>
                                    <a href="#" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                </div>
                            </div>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="status" id="publish" value="1"> Publish
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-content">
                        <h4 class="card-title">Categories & Tags</h4>
                        <div class="form-group {{ $errors->has('categories') ? 'focused error' : '' }}">
                            <select class="selectpicker" data-style="select-with-transition" data-live-search="true" multiple title="Choose Category" name="categories[]" id="category">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="form-group {{ $errors->has('tags') ? 'focused error' : '' }}">
                            <select class="selectpicker" data-style="select-with-transition" data-live-search="true" multiple title="Choose Tag" name="tags[]" id="tag">
                                @foreach($tags as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-content">
                        <h4 class="card-title">Body</h4>
                        <div class="form-group">
                            <textarea id="ta" name="body"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <a href="{{ route('admin.post.index') }}" class="btn btn-default btn-raised"><i class="material-icons">arrow_back</i></a>
        <button type="submit" class="btn btn-fill btn-rose">Submit</button>
    </form>
@endsection

@push('js')
    <script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
    <script>
        tinymce.init({
            selector: '#ta'
        });
    </script>
@endpush
