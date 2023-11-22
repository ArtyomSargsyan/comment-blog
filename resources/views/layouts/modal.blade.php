<div class="modal fade" id="exampleModalCenter{{ $comment->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Comment Update</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('comment.update') }}" method="post">
                    @csrf
                    <textarea type="text" class="form-control mb-2" name="content" id="" cols="30" rows="4">{{ $comment->content }}</textarea>
                    <input type="hidden" name="id" value="{{$comment->id}}">
                    <button style="float: inline-end;" type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
