@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="font-weight-bold">{{ $article->title }}</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <p class="p-1">{{ $article->text }}</p>
                    </div>
                    <div class="col-12 text-right">
                        <p class="m-0">Author: <b>{{ $article->author }}</b></p>
                        <p class="m-0">Publication time: <b>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($article->updated_at))->diffForHumans() }}</b></p>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
