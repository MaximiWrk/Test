@extends('layouts.app')

@section('content')
    <div class="container">
        @if( session()->has('message'))
            <div class="alert alert-success">
                <b>{{ session()->get('message') }}</b>
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                <h3 class="font-weight-bold">Categories</h3>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    @if(!$categories->isEmpty())
                        <thead>
                        <tr>
                            <td>Title</td>
                            <td>Last update</td>
                            <td class="text-right">Actions</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{ $category->category_name }}</td>
                                <td>{{ $category->updated_at }}</td>
                                <td class="text-right">
                                    <form action="{{ route('categories.destroy', $category->category_id) }}" method="POST">
                                        <a class="btn btn-success"
                                           href="{{ route('categories.edit',$category->category_id) }}">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    @else
                        <div class="d-flex justify-content-center">
                            <b>Unfortunately there are no articles yet. You may add one!</b>
                        </div>
                    @endempty
                </table>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-8">
                {{ $categories->links('pagination') }}
            </div>
            <div class="col-4">
                <div class="text-right">
                    <a href="{{ route('categories.create') }}" class="btn btn-lg btn-success"> Add category</a>
                </div>
            </div>
        </div>
    </div>
@endsection
