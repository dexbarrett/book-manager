@extends('layouts.app')
@section('body')
    <h2>Registrar Autor</h2>
    <form action="{{ action('AuthorController@store')  }}" method="POST">
        @csrf
        @include('partials.flash_messages')
        @include('partials.validation_errors')
        <div class="form-row">
            <div class="col-md-12 form-group">
                <label for="title">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" autocomplete="off">
                <div class="invalid-feedback">
                    {{ $errors->first('name')  }}
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-12 form-group">
                <label for="sort_name">Nombre para ordenar</label>
                <input type="text" class="form-control" id="sort_name" name="sort_name" value="{{ old('sort_name') }}" autocomplete="off">
                <div class="invalid-feedback">
                    {{ $errors->first('sort_name')  }}
                </div>
            </div>
        </div>
        <button class="btn btn-primary" type="submit">Registrar</button>
    </form>
@endsection
