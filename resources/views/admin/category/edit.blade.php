@extends('layouts.backend.app')

@section('title', 'Categories')

@push('css')

@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="rose">
                    <i class="material-icons">apps</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Edit Category</h4>
                    <form method="POST" action="{{ route('admin.category.update', $category->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label class="control-label">Category Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}">
                        </div>
                        <div class="form-group">
                            <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                <div class="fileinput-new thumbnail">
                                    @if(isset($category->image))
                                        <img src="{{ Storage::disk('public')->url('category/'.$category->image) }}" alt="Preview">
                                    @else
                                        <img src="{{ asset('assets/backend/img/image_placeholder.jpg') }}" alt="image upload">
                                    @endif
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                <div>
                                    <span class="btn btn-rose btn-round btn-file">
                                        <span class="fileinput-new">Select image</span>
                                        <span class="fileinput-exists">Change</span>
                                        <input type="file" name="image">
                                    </span>
                                    <a href="#" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                </div>
                            </div>
                        </div>

                        <a href="{{ route('admin.category.index') }}" class="btn btn-default btn-raised"><i class="material-icons">arrow_back</i></a>
                        <button type="submit" class="btn btn-fill btn-rose">Update</button>
                    </form>
                </div>
            </div>
        </div>
@endsection

@push('js')
@endpush
