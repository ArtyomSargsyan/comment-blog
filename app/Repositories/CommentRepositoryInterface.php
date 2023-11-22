<?php

namespace  App\Repositories;


interface CommentRepositoryInterface
{
    public function commentById($id);
    public function store($content, $blogId, $userId);
    public function update($id, $content);
    public function delete($id);
    public function commentReplay($content, $parentId, $blogId, $userId);
}
