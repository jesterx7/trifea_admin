@extends('layout.main_template', ['activePage' => 'trip', 'navName' => 'Table List', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">  
                            <h4 class="card-title table-tittle">City List</h4>
                            <a class="btn btn-info btn-fill btn-wd add-table" href="{{route('add_trip')}}">
                                Add
                            </a>
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <th>Track Name</th>
                                    <th>City</th>
                                    <th>Fee</th>
                                </thead>
                                <tbody>
                                    @foreach($trip as $key => $data)
                                        <tr>
                                            <td>{{ $data->track_name }}</td>
                                            <td>{{ $data->city_name }}</td>
                                            <td>Rp. {{ $data->fee }}</td>
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