@extends('layouts.app')
@push('css')
<style>
    #footer {
        display: none !important;
    }

    .card-header {
        border-bottom: 1px solid rgb(192 31 34) !important;
    }

</style>
@section('content')
<div class="container mt-5 pt-5">
    <div class="row justify-content-center">
        <div class="col-md-7 mt-md-5">
            <div class="card custom-shadow">
                <div class="card-header gotham-bold text-red-light">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 text-red-light col-form-label text-md-right gotham-bold">{{ __('Name') }} *</label>

                            <div class="col-md-6">
                                <div class="input-group  input-group-md">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="text-red-light far fa-user"></i></span>
                                    </div>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 text-red-light col-form-label text-md-right gotham-bold">{{ __('E-Mail Address') }} *</label>

                            <div class="col-md-6">
                                <div class="input-group  input-group-md">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="text-red-light far fa-envelope"></i></span>
                                    </div>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 text-red-light col-form-label text-md-right gotham-bold">{{ __('Password') }} *</label>

                            <div class="col-md-6">
                                <div class="input-group  input-group-md">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="text-red-light fas fa-unlock-alt"></i></span>
                                    </div>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 text-red-light col-form-label text-md-right gotham-bold">{{ __('Confirm Password') }} *</label>

                            <div class="col-md-6">
                                <div class="input-group  input-group-md">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="text-red-light fas fa-unlock-alt"></i></span>
                                    </div>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn bg-red-light rounded-lg btn-sm gotham-bold text-white">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
