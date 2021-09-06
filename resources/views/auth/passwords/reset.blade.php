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
@endpush
@section('content')
<div class="container mt-5 pt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-md-5">
            <div class="card custom-shadow">
                <div class="card-header gotham-bold text-red">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group row">
                            <label for="email" class="gotham-bold text-red col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <div class="input-group  input-group-md">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="text-red fas fa-envelope"></i></span>
                                    </div>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="gotham-bold  text-red col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <div class="input-group  input-group-md">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="text-red fas fa-lock"></i></span>
                                    </div>
                                    <input id="password" type="password" class="text-red form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="gotham-bold  text-red col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <div class="input-group  input-group-md">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="text-red fas fa-lock"></i></span>
                                    </div>
                                    <input id="password-confirm" type="password" class="text-red form-control" name="password_confirmation" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn bg-red text-white">
                                    {{ __('Reset Password') }}
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
