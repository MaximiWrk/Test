@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Categories</h3>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            @if(!$categories->isEmpty())
                                @foreach($categories as $category)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <a class="nav-link" href="{{ route('category.browse', $category->id) }}">{{ $category->category_name }}</a>
                                        <span class="badge badge-primary badge-pill">{{ $category->articles_count }}</span>
                                    </li>
                                @endforeach
                            @else
                            <li class="alert alert-danger">
                                <b>There are no categories!</b>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

