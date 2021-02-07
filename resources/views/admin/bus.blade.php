@extends('layout.main_template', ['activePage' => 'bus', 'navName' => 'Table List', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">  
                            <h4 class="card-title table-tittle">Bus Schedule</h4>
                            <a class="btn btn-info btn-fill btn-wd add-table" href="{{route('add_bus')}}">
                                Add
                            </a>
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <th>Bus ID</th>
                                    <th>Police Number</th>
                                    <th>Bus Name</th>
                                    <th>Capacity</th>
                                    <th>Brand</th>
                                    <th>Type</th>
                                </thead>
                                <tbody>
                                    @foreach($bus as $key => $data)
                                        <tr>
                                            <td>{{ $data->bus_id }}</td>
                                            <td>{{ $data->police_number }}</td>
                                            <td>{{ $data->bus_name }}</td>
                                            <td>{{ $data->capacity }}</td>
                                            <td>{{ $data->brand }}</td>
                                            <td>{{ $data->type_name }}</td>
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