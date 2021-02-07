@extends('layout.main_template', ['activePage' => 'trip', 'navName' => 'User Profile', 'activeButton' => 'laravel'])

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
                                    <h3 class="mb-0">Add Trip</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="post" action="/add_trip" enctype="multipart/form-data">
                                @csrf
                                <div>
                                    <div class="form-group">
                                        <label class="form-control-label"><i class="w3-xxlarge nc-icon nc-bag"></i> Track</label>
                                        <select name="track_name" class="form-control" required>
                                            @foreach($track_name as $key => $data)
                                                <option value="{{ $data->track_id }}">{{ $data->track_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label"><i class="w3-xxlarge nc-icon nc-bag"></i> City</label>
                                        <select name="city_name" class="form-control" required>
                                            @foreach($city_name as $key => $data)
                                                <option value="{{ $data->city_id }}">{{ $data->city_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label"><i class="w3-xxlarge  nc-icon nc-single-02"></i> Fee</label>
                                        <input type="number" name="fee" id="input-name" class="form-control" placeholder="Fee" required autofocus>
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