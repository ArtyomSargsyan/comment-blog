@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="card mb-3">
                    <div class="card-header">
                        Blog
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $blog->title }}</h5>
                        <p class="card-text">{{ $blog->content }}</p>

                    </div>
                </div>
                <form class="mb-4" action="{{ route('comment.store') }}" method="post">
                    @csrf
                    <div class="form-control mb-2">
                        <textarea type="text" class="form-control mb-3" name="content" cols="30" placeholder="Add Comment" rows="4"></textarea>
                    </div>

                    <input type="hidden" name="blog_id" value="{{ $blog->id }}" >
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                <h4>Comments</h4>
                @include('comments.commentDispaly', ['comments' => $blog->comments, 'blog_id' => $blog->id])
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/script.js') }}" defer></script>
@endsection
