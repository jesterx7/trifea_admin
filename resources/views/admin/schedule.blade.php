@extends('layout.main_template', ['activePage' => 'schedule', 'navName' => 'Table List', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">  
                            <h4 class="card-title table-tittle">Bus Schedule</h4>
                            <a class="btn btn-info btn-fill btn-wd add-table" href="{{route('add_employee')}}">
                                Add
                            </a>
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <th>Schedule ID</th>
                                    <th>Driver</th>
                                    <th>Conductor</th>
                                    <th>Bus Name</th>
                                    <th>Track</th>
                                </thead>
                                <tbody>
                                    @foreach($schedules as $key => $data)
                                        <tr>
                                            <td>{{ $data->schedule_id }}</td>
                                            <td>{{ $data->driver }}</td>
                                            <td>{{ $data->conductor }}</td>
                                            <td>{{ $data->bus_name }}</td>
                                            <td>{{ $data->track_name }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection