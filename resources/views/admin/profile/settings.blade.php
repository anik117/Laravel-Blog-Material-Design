@extends('layouts.backend.app')

@section('title', 'Profile Settings')

@push('css')

@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Profile Settings</h4>
                </div>
                <div class="card-content">
                    <ul class="nav nav-pills nav-pills-rose">
                        <li class="active">
                            <a href="#pill1" data-toggle="tab" aria-expanded="true">Update Profile</a>
                        </li>
                        <li class="">
                            <a href="#pill2" data-toggle="tab" aria-expanded="false">Change Password</a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane active" id="pill1">
                            <form method="POST" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="username" name="username" placeholder="Enter username.." value="{{ Auth::user()->username }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email.." value="{{ Auth::user()->email }}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name.." value="{{ Auth::user()->name }}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <textarea class="form-control" name="about" rows="5" placeholder="Enter about yourself">{{ Auth::user()->about }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail">
                                                    @if(isset( Auth::user()->image))
                                                        <img src="{{ Storage::disk('public')->url('profile/'.Auth::user()->image) }}" alt="Preview">
                                                    @else
                                                        <img src="{{ asset('assets/backend/img/image_placeholder.jpg') }}" alt="image upload">
                                                    @endif
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                                <div>
                                                    <span class="btn btn-rose btn-round btn-file">
                                                        <span class="fileinput-new">Profile Picture</span>
                                                        <span class="fileinput-exists">Change</span>
                                                        <input type="file" name="image">
                                                    </span>
                                                    <a href="#" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-rose pull-left">Update Profile</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                        <div class="tab-pane" id="pill2">
                            Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate one-to-one customer service with robust ideas.
                            <br>
                            <br>Dynamically innovate resource-leveling customer service for state of the art customer service.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')

@endpush
