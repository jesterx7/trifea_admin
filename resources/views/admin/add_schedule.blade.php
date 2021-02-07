@extends('layout.main_template', ['activePage' => 'schedule', 'navName' => 'User Profile', 'activeButton' => 'laravel'])

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
                                    <h3 class="mb-0">Add Schedule</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="post" action="/add_schedule" enctype="multipart/form-data">
                                @csrf
                                <div>
                                    <div class="form-group">
                                        <label class="form-control-label"><i class="w3-xxlarge nc-icon nc-bag"></i> Driver</label>
                                        <select name="driver" class="form-control" required>
                                            @foreach($driver as $key => $data)
                                                <option value="{{ $data->employee_id }}">{{ $data->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label"><i class="w3-xxlarge nc-icon nc-bag"></i> Conductor</label>
                                        <select name="conductor" class="form-control" required>
                                            @foreach($conductor as $key => $data)
                                                <option value="{{ $data->employee_id }}">{{ $data->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label"><i class="w3-xxlarge nc-icon nc-bag"></i> Bus</label>
                                        <select name="bus" class="form-control" required>
                                            @foreach($bus as $key => $data)
                                                <option value="{{ $data->bus_id }}">{{ $data->bus_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label"><i class="w3-xxlarge nc-icon nc-bag"></i> Track</label>
                                        <select name="track" class="form-control" required>
                                            @foreach($track as $key => $data)
                                                <option value="{{ $data->track_id }}">{{ $data->track_name }}</option>
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