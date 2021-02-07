@extends('layout.main_template', ['activePage' => 'table', 'navName' => 'User Profile', 'activeButton' => 'laravel'])

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
                                    <h3 class="mb-0">Add Employee</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="post" action="/add_employee" enctype="multipart/form-data">
                                @csrf
                                <div>
                                    <div class="form-group">
                                        <label class="form-control-label"><i class="w3-xxlarge  nc-icon nc-single-02"></i> Name</label>
                                        <input type="text" name="name" id="input-name" class="form-control" placeholder="Name" required autofocus>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label"><i class="w3-xxlarge nc-icon nc-email-83"></i> Email</label>
                                        <input type="email" name="email" id="input-email" class="form-control" placeholder="Email" required>
                                    </div>  
                                    <div class="form-group">
                                        <label class="form-control-label"><i class="w3-xxlarge nc-icon nc-badge"></i> Username</label>
                                        <input type="text" name="username" class="form-control" placeholder="Username" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label"><i class="w3-xxlarge nc-icon nc-lock-circle-open"></i> Password</label>
                                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label"><i class="w3-xxlarge nc-icon nc-compass-05"></i> Address</label>
                                        <input type="text" name="address" class="form-control" placeholder="Address" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label"><i class="w3-xxlarge nc-icon nc-tablet-2"></i> Phone Number</label>
                                        <input type="text" name="phone_number" class="form-control" placeholder="Phone Number" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label"><i class="w3-xxlarge nc-icon nc-bag"></i> Occupation</label>
                                        <select name="occupation" class="form-control" required>
                                            @foreach($occupations as $key => $occupation)
                                                <option value="{{ $occupation->occupation_id }}">{{ $occupation->occupation_name }}</option>
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