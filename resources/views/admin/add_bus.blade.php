@extends('layout.main_template', ['activePage' => 'bus', 'navName' => 'User Profile', 'activeButton' => 'laravel'])

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
                                    <h3 class="mb-0">Add Bus</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="post" action="/add_bus" enctype="multipart/form-data">
                                @csrf
                                <div>
                                    <div class="form-group">
                                        <label class="form-control-label"><i class="w3-xxlarge  nc-icon nc-single-02"></i> Police Number</label>
                                        <input type="text" name="police_number" id="input-name" class="form-control" placeholder="Police Number" required autofocus>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label"><i class="w3-xxlarge nc-icon nc-email-83"></i> Bus Name</label>
                                        <input type="text" name="bus_name" id="input-email" class="form-control" placeholder="Bus Name" required>
                                    </div>  
                                    <div class="form-group">
                                        <label class="form-control-label"><i class="w3-xxlarge nc-icon nc-badge"></i> Capacity</label>
                                        <input type="number" name="capacity" class="form-control" placeholder="Capacity" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label"><i class="w3-xxlarge nc-icon nc-lock-circle-open"></i> Brand</label>
                                        <input type="text" name="brand" class="form-control" placeholder="Brand" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label"><i class="w3-xxlarge nc-icon nc-bag"></i> Bus Type</label>
                                        <select name="type_id" class="form-control" required>
                                            @foreach($type as $key => $type)
                                                <option value="{{ $type->type_id }}">{{ $type->type_name }}</option>
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