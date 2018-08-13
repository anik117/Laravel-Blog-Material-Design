@extends('layouts.backend.app')

@section('title', 'Dashboard')

@push('css')
@endpush

@section('content')
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header" data-background-color="orange">
                            <i class="material-icons">face</i>
                        </div>
                        <div class="card-content">
                            <p class="category">Total Users</p>
                            <h3 class="card-title">{{ $users }}</h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons text-danger">warning</i>
                                <a href="#">Low users count</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header" data-background-color="rose">
                            <i class="material-icons">equalizer</i>
                        </div>
                        <div class="card-content">
                            <p class="category">Website Visits</p>
                            <h3 class="card-title">75.521</h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">local_offer</i> Tracked from Google Analytics
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header" data-background-color="green">
                            <i class="material-icons">library_books</i>
                        </div>
                        <div class="card-content">
                            <p class="category">Total Posts</p>
                            <h3 class="card-title"><a href="{{ route('admin.post.index') }}">{{ $posts }}</a></h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">date_range</i> Last 24 Hours
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header" data-background-color="blue">
                            <i class="fa fa-twitter"></i>
                        </div>
                        <div class="card-content">
                            <p class="category">Followers</p>
                            <h3 class="card-title">+245</h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">update</i> Just Updated
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
