@extends('layout.main_template', ['activePage' => 'city', 'navName' => 'User Profile', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="section-image">
                <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
                <div class="row">

                    <div class="card col-md-12">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-md-12">
                                    <h3 class="mb-0">Add City</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="post" action="/add_city" enctype="multipart/form-data">
                                @csrf
                                <div>
                                    <div class="form-group">
                                        <label class="form-control-label"><i class="w3-xxlarge  nc-icon nc-single-02"></i> City Name</label>
                                        <input type="text" name="city_name" id="input-name" class="form-control" placeholder="City Name" required autofocus>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label"><i class="w3-xxlarge  nc-icon nc-single-02"></i> Latitude</label>
                                        <input type="number" step="0.00000001" name="latitude" id="input-name" class="form-control" placeholder="Latitude" required autofocus>
                                    </div>
                                     <div class="form-group">
                                        <label class="form-control-label"><i class="w3-xxlarge  nc-icon nc-single-02"></i> Longitude</label>
                                        <input type="number" step="0.00000001" name="longitude" id="input-name" class="form-control" placeholder="Longitude" required autofocus>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-default btn-add">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection