
@if ( !is_null($blog->comments))

    @foreach ($comments as $comment )
        <div class="comment mt-4 text-justify float-left" @if($comment->parent_id != null) style="margin-left:40px;" @endif>
            <i style="float: right; font-size: 21px;cursor: pointer" data-toggle="modal" data-target="#exampleModalCenter{{ $comment->id }}" class="fa fa-pencil"></i>

            <a style="float: right; float: right;
                                                  margin-right: 16px;" href="/comment-delete/{{$comment->id}}"><i style="float: right;font-size: 22px;" class="fa fa-trash-o"></i></a>
            <h5>{{$comment->user->name}} </h5>
            <a href="{{route('show.comment', $comment->id)}}"><p >{{ $comment->content }}</p></a>

        </div>
        <span  @if($comment->parent_id != null) style="margin-left:40px;" @endif  data-item-id="{{ $comment->id }}" class="click-replay"><i class="fa fa-reply"></i> reply</span>
        <form class="replay display" action="{{ route('comment.replay')}}" method="post">
            @csrf
            <textarea type="text" name="content" class="form-control mb-2" rows="1"></textarea>
            <input type="hidden" name="parent_id" value="{{ $comment->id }}">
            <input type="hidden" name="blog_id"  value="{{  $blog->id}}">
            <button style="float: right" class="btn btn-primary">Send</button>
        </form>
        @include('../layouts/modal');
        @include('comments.commentDispaly', ['comments' => $comment->replies])
    @endforeach
@endif


<script>
    $(document).ready(function(){
        // jQuery to handle click event
        $('.click-replay').click(function(){
            // Find the associated ID for the clicked item
            var itemId = $(this).data('item-id');

            // Toggle visibility of the associated additional content
            $('#display-' + itemId).toggle();
        });
    });
</script>

