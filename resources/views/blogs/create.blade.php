@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card-header mb-4">Blog Create <a style="float: right;" class="btn btn-primary" href="{{ route('admin') }}">Back</a></div>

                <form action="{{ route('blog.store') }}" method="Post">
                    @csrf
                    <div class="form-group mb-2">
                        <input type="text" class="form-control" name="title" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter title">
                        @if ($errors->has('title'))
                            <span class="text-danger">{{ $errors->first('title') }}</span>
                        @endif
                    </div>
                    <div class="form-group mb-2">
                        <textarea  class="form-control mb-3" name="content" cols="30" placeholder="Content" rows="4"></textarea>
                        @if ($errors->has('content'))
                            <span class="text-danger">{{ $errors->first('content') }}</span>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
