@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="d-flex flex-column text-center">
            <div>
                <h1>Welcome</h1>
            </div>
            <div><p><a href="{{ route('articles.index') }}">Articles Page</a></p></div>
        </div>
    </div>
</div>
@endsection
