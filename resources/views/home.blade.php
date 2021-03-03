@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="d-flex flex-column text-center">
                <h1>Welcome</h1>
            </div>
        </div>
        <div class="col-12">
            <div class="d-flex justify-content-between">
                <div>
                    <a class="btn btn-primary btn-lg" href="{{ route('categories.list') }}">Categories List</a>
                </div>
                <div>
                    <a class="btn btn-primary btn-lg" href="{{ route('categories.index') }}">Categories Edit</a>
                    <a class="btn btn-primary btn-lg" href="{{ route('articles.index') }}">Articles Edit</a>
                </div>
            </div>
        </div>
    </div>
@endsection
