@extends('layout.main_template', ['activePage' => 'track', 'navName' => 'User Profile', 'activeButton' => 'laravel'])

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
                                    <h3 class="mb-0">Add Track</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="post" action="/add_track" enctype="multipart/form-data">
                                @csrf
                                <div>
                                    <div class="form-group">
                                        <label class="form-control-label"><i class="w3-xxlarge  nc-icon nc-single-02"></i> Track Name</label>
                                        <input type="text" name="track_name" id="input-name" class="form-control" placeholder="Track Name" required autofocus>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label"><i class="w3-xxlarge nc-icon nc-bag"></i> Origin</label>
                                        <select name="origin" class="form-control" required>
                                            @foreach($origin as $key => $data)
                                                <option value="{{ $data->city_id }}">{{ $data->city_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label"><i class="w3-xxlarge nc-icon nc-bag"></i> Destination</label>
                                        <select name="destination" class="form-control" required>
                                            @foreach($destination as $key => $data)
                                                <option value="{{ $data->city_id }}">{{ $data->city_name }}</option>
                                            @endforeach
                                        </select>
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