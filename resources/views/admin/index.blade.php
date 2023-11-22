@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="col-md-12">
                <div class="card-header">Admin Home <a style="float: right;" class="btn btn-primary" href="{{ route('create.blog') }}">Create Blog</a></div>

                <table class="table mb-4">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Content</th>
                        <th scope="col">User Name</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach ($blogs as $blog)
                        <tr>
                            <th scope="row">1</th>
                            <td style="width: 15%"><a href="{{ route('admin.comment.edit', $blog->id) }}">{{ $blog->title }} </a></td>
                            <td> <a href="{{ route('admin.comment.edit', $blog->id) }}">{{ $blog->content }}</a> </td>
                            <td style="width: 10%">{{ $blog->user->name }}</td>

                            @if (  Auth::check() && Auth::user()->is_admin == 1)
                                <td><a class="btn btn-primary" href="{{ route('admin.blog.edit', $blog->id) }}">Edit </a></td>
                                <td><a class="btn btn-danger" href="{{ route('admin.blog.delete', $blog->id) }}">Delete</a></td>
                            @endif

                        </tr>
                    @endforeach

                    </tbody>
                </table>
                <div class="d-flex justify-content-center mt-3">
                    {!! $blogs->links() !!}
                </div>
            </div>
        </div>
    </div>


    <style>
        a{
            color: black;
            text-decoration: none;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
@endsection
