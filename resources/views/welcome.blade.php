@extends('layout/main_template', ['activePage' => 'login', 'navName' => 'Dashboard', 'activeButton' => 'laravel'])

@section('content')
    <div class="full-page section-image" data-color="black" data-image="{{ asset('img/full-screen-image-2.jpg') }}">
        <div class="content pt-5">
            <div class="container mt-5">    
                <div class="col-md-4 col-sm-6 ml-auto mr-auto">
                    <form class="form" method="POST" action="/login">
                        @csrf
                        <div class="card card-login card-hidden">
                            <div class="card-header ">
                                <h3 class="header text-center">Login</h3>
                            </div>
                            <div class="card-body ">
                                <div class="card-body">
                                    <div class="form-group">
                                        @if (count($errors) > 0)
                                            <span class="invalid-feedback" role="alert">
                                                <ul>
                                                @foreach($errors->all() as $error)
                                                    <li><strong>{{ $error }}</strong></li>
                                                @endforeach
                                                </ul>
                                            </span>
                                        @endif
                                        <label for="email" class="col-md-6 col-form-label">E-Mail Address</label>
                                        <div class="col-md-14">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', 'admin@lightbp.com') }}" required autocomplete="email" autofocus>
                                        </div>
                                        <div class="form-group">
                                            <label for="password" class="col-md-6 col-form-label">Password</label>
                
                                            <div class="col-md-14">
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password', 'secret') }}" required autocomplete="current-password">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-check">
                                                <label class="form-check-label d-flex align-items-center">
                                                    <input class="form-check-input" type="checkbox" name="remember"  id="remember">
                                                    <span class="form-check-sign"></span>
                                                    Remember me
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer ml-auto mr-auto">
                                    <div class="container text-center" >
                                        <button type="submit" class="btn btn-warning btn-wd">Login</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            demo.checkFullPageBackgroundImage();

            setTimeout(function() {
                // after 1000 ms we add the class animated to the login/register card
                $('.card').removeClass('card-hidden');
            }, 700)
        });
    </script>
@endpush