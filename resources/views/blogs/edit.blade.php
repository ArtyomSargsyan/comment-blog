@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card-header mb-2"><a style="float: right;" class="btn btn-primary mb-3" href="{{ route('admin') }}">Back</a></div>
                <form action="{{ route('blog.update') }}" method="post">
                    @csrf
                    <div class="form-group mb-2">
                        <input type="text" class="form-control" name="title" value="{{ $blog->title }}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter title">
                    </div>
                    <textarea  class="form-control mb-3" name="content" cols="30" placeholder="Content" rows="4">{{ $blog->content }}</textarea>
                    <input type="hidden" name="id" value="{{ $blog->id }}">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
