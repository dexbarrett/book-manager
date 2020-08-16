@extends('layouts.app')
@section('body')
    <div class="row">
        <div class="col-sm-12">
            @include('partials.validation_errors')
            <form action="{{ action('LoginController@login') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="pwd">Password</label>
                    <input type="password" class="form-control" name="pwd">
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" name="remember">
                    <label class="form-check-label" for="remember">Remember Me</label>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>
@endsection
