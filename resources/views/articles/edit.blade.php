@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="font-weight-bold">Update "{{ $article->title }}"</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('articles.update', $article->article_id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label for="title" class="font-weight-bold col-form-label text-right col-md-4">Title</label>
                        <div class="col-md-6">
                            <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" id="title" placeholder="Title" value="{{ $article->title }}">
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="author" class="font-weight-bold col-form-label text-right col-md-4">Author</label>
                        <div class="col-md-6">
                            <input class="form-control @error('author') is-invalid @enderror" type="text" name="author" id="author" placeholder="author" value="{{ $article->author }}">
                            @error('author')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="text" class="font-weight-bold col-form-label text-right col-md-4">Text</label>
                        <div class="col-md-6">
                            <textarea rows="5" class="form-control @error('text') is-invalid @enderror" type="text" name="text" id="text" placeholder="Text...">{{ $article->text }}</textarea>
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
