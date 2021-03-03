@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="font-weight-bold">Create Category</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('categories.store') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label for="category_name" class="font-weight-bold col-form-label text-right col-md-4">Title</label>
                        <div class="col-md-6">
                            <input class="form-control @error('category_name') is-invalid @enderror" type="text" name="category_name" id="category_name" placeholder="Category name">
                            @error('category_name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="text-right col-md-10">
                            <button type="submit" class="btn btn-primary">
                                Submit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
