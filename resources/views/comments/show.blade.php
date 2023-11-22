@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card-body">
                    <h5 class="card-title">{{$comment->user->name}}</h5>
                    <p class="card-text">{{$comment->content}}</p>
                    <a href="/" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
