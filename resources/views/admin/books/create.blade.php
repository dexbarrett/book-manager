@extends('layouts.app')
@section('body')
    <h2>Registrar Libro</h2>
    <form action="{{ action('BookController@store')  }}" method="POST">
        @csrf
        @include('partials.validation_errors')
        @include('partials.flash_messages')
        <div class="form-row">
            <div class="col-md-12 form-group">
                <label for="title">Título</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-12 form-group">
                <label for="sort_title">Título para ordenar</label>
                <input type="text" class="form-control" name="sort_title" id="sort_title" value="{{ old('sort_title') }}">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="author">Autor</label>
                {{ Form::select(
                    'author',
                    [],
                    old('author'),
                    ['class' => 'form-control autocomplete-live', 'data-search-type' => 'search_author', 'id' => 'author']
                )}}
            </div>
            <div class="form-group col-md-6">
                <label for="publisher">Editorial</label>
                {{ Form::select(
                    'publisher',
                     $publishers,
                      null,
                      ['class' => 'form-control autocomplete-live-taggable', 'placeholder' => 'elegir editorial', 'data-search-type' => 'search_publisher']
                    )
                }}
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="language">Idioma</label>
                {{ Form::select(
                    'language',
                     $languages,
                      null,
                      ['class' => 'form-control autocomplete', 'placeholder' => 'elegir idioma']
                    )
                }}
            </div>
            <div class="form-group col-md-6">
                <label for="category">Categoría</label>
                {{ Form::select(
                    'category',
                     $categories,
                      null,
                      ['class' => 'form-control autocomplete', 'placeholder' => 'elegir categoría']
                    )
                }}
            </div>
        </div>
        <button class="btn btn-primary" type="submit">Registrar</button>
    </form>
@endsection
