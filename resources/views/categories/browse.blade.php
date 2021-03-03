@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @if(!$articles->isEmpty())
                @foreach($articles as $article)
                    <div class="col-12 mt-3">
                        <div class="card">
                            <div class="card-header">
                                <h3>{{ $article->title }}</h3>
                            </div>
                            <div class="card-body">
                                <p>{{ $article->text }}</p>
                                <div class="text-right">
                                    <p class="m-0">Author: <b>{{ $article->author }}</b></p>
                                    <p class="m-0">Publication time: <b>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($article->updated_at))->diffForHumans() }}</b></p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="alert alert-danger">
                    <b>There are no articles!</b>
                </div>
            @endif
        </div>
    </div>
@endsection
