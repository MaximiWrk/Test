@extends('layouts.app')

@section('content')
    <div class="container">
        @if( session()->has('message'))
            <div class="alert alert-success">
                <p>{{ session()->get('message') }}</p>
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                <h3 class="font-weight-bold">Articles</h3>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <td>Title</td>
                        <td>Last update</td>
                        <td>Author</td>
                        <td class="text-right">Actions</td>
                    </tr>
                    </thead>
                    @empty($articles)

                    @else
                        <tbody>
                        @foreach($articles as $article)
                            <tr>
                                <td>{{ $article->title }}</td>
                                <td>{{ $article->updated_at }}</td>
                                <td>{{ $article->author }}</td>
                                <td class="text-right">
                                    <form action="{{ route('articles.destroy', $article->article_id) }}" method="POST">
                                        <a class="btn btn-primary"
                                           href="{{ route('articles.show',$article->article_id) }}">Show</a>
                                        <a class="btn btn-success"
                                           href="{{ route('articles.edit',$article->article_id) }}">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    @endempty
                </table>
            </div>
        </div>
            <div class="row mt-2">
                <div class="col-8">
                    {{ $articles->links('pagination') }}
                </div>
                <div class="col-4">
                    <div class="text-right">
                        <a href="{{ route('articles.create') }}" class="btn btn-lg btn-success"> Add article</a>
                    </div>
                </div>
            </div>
    </div>
@endsection
