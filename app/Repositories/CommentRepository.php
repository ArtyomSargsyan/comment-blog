<?php

namespace App\Repositories;

use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;


class CommentRepository  implements  CommentRepositoryInterface
{

    /**
     * @var Comment
     */
    protected Comment $comment;

    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function commentById($id): mixed
    {
        return Blog::find($id);
    }

    public function getCommentId($id)
    {
        return $this->comment->find($id);
    }

    /**
     * @param $content
     * @param $blogId
     * @param $userId
     * @return void
     */
    public function store($content, $blogId, $userId)
    {

        $comment = new $this->comment;
        $comment->content = $content;
        $comment->blog_id = $blogId;
        $comment->user_id = $userId;

        $comment->save();
    }

    /**
     * @param $id
     * @param $content
     * @return void
     */
    public function update($id, $content)
    {

        $comment = $this->comment->find($id);
        $comment->content = $content;

        $comment->save();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id): mixed
    {

        $comment= $this->comment->find($id);
        return  $comment->delete();

    }

    /**
     * @param $content
     * @param $parentId
     * @param $blogId
     * @param $userId
     * @return void
     */
    public function commentReplay($content, $parentId, $blogId, $userId)
    {
        $comment = new $this->comment;
        $comment->content = $content;
        $comment->parent_id = $parentId;
        $comment->blog_id = $blogId;
        $comment->user_id = $userId;

        $comment->save();
    }


}
