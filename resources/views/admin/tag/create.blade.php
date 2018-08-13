@extends('layouts.backend.app')

@section('title', 'Tags')

@push('css')

@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="rose">
                    <i class="material-icons">label</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Create Tag</h4>
                    <form method="POST" action="{{ route('admin.tag.store') }}">
                        @csrf
                        <div class="form-group">
                            <label class="control-label">Tag Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter tag name.." required>
                        </div>
                        <a href="{{ route('admin.tag.index') }}" class="btn btn-default btn-raised"><i class="material-icons">arrow_back</i></a>
                        <button type="submit" class="btn btn-fill btn-rose">Create</button>
                    </form>
                </div>
        </div>
    </div>
@endsection

@push('js')
@endpush
