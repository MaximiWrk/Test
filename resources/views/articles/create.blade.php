@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="font-weight-bold">Create Article</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('articles.store') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label for="title" class="font-weight-bold col-form-label text-right col-md-4">Title</label>
                        <div class="col-md-6">
                            <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" id="title" placeholder="Title">
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="text" class="font-weight-bold col-form-label text-right col-md-4">Text</label>
                        <div class="col-md-6">
                            <textarea class="form-control @error('title') is-invalid @enderror" type="text" name="text" id="text" placeholder="Text..."></textarea>
                            @error('text')
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
