@extends('layout.main_template', ['activePage' => 'track', 'navName' => 'Table List', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">  
                            <h4 class="card-title table-tittle">Track</h4>
                            <a class="btn btn-info btn-fill btn-wd add-table" href="{{route('add_employee')}}">
                                Add
                            </a>
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <th>Track ID</th>
                                    <th>Track Name</th>
                                    <th>Origin</th>
                                    <th>Destination</th>
                                </thead>
                                <tbody>
                                    @foreach($tracks as $key => $data)
                                        <tr>
                                            <td>{{ $data->track_id }}</td>
                                            <td>{{ $data->track_name }}</td>
                                            <td>{{ $data->origin }}</td>
                                            <td>{{ $data->destination }}</td>
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