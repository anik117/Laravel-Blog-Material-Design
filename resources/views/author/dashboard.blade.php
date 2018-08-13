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
                            <i class="material-icons">weekend</i>
                        </div>
                        <div class="card-content">
                            <p class="category">Bookings</p>
                            <h3 class="card-title">184</h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons text-danger">warning</i>
                                <a href="#pablo">Get More Space...</a>
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
                            <i class="material-icons">store</i>
                        </div>
                        <div class="card-content">
                            <p class="category">Revenue</p>
                            <h3 class="card-title">$34,245</h3>
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
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-icon" data-background-color="rose">
                            <i class="material-icons">assignment</i>
                        </div>
                        <div class="card-content">
                            <h4 class="card-title">Simple Table</h4>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="text-primary">
                                    <tr><th>Name</th>
                                        <th>Country</th>
                                        <th>City</th>
                                        <th>Salary</th>
                                    </tr></thead>
                                    <tbody>
                                    <tr>
                                        <td>Dakota Rice</td>
                                        <td>Niger</td>
                                        <td>Oud-Turnhout</td>
                                        <td class="text-primary">$36,738</td>
                                    </tr>
                                    <tr>
                                        <td>Minerva Hooper</td>
                                        <td>Curaçao</td>
                                        <td>Sinaai-Waas</td>
                                        <td class="text-primary">$23,789</td>
                                    </tr>
                                    <tr>
                                        <td>Sage Rodriguez</td>
                                        <td>Netherlands</td>
                                        <td>Baileux</td>
                                        <td class="text-primary">$56,142</td>
                                    </tr>
                                    <tr>
                                        <td>Philip Chaney</td>
                                        <td>Korea, South</td>
                                        <td>Overland Park</td>
                                        <td class="text-primary">$38,735</td>
                                    </tr>
                                    <tr>
                                        <td>Doris Greene</td>
                                        <td>Malawi</td>
                                        <td>Feldkirchen in Kärnten</td>
                                        <td class="text-primary">$63,542</td>
                                    </tr>
                                    <tr>
                                        <td>Mason Porter</td>
                                        <td>Chile</td>
                                        <td>Gloucester</td>
                                        <td class="text-primary">$78,615</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@push('js')
    <script type="text/javascript">
        $(document).ready(function() {

            // Javascript method's body can be found in assets/js/demos.js
            demo.initDashboardPageCharts();

            demo.initVectorMap();
        });
    </script>
@endpush
