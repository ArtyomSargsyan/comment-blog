<?php

namespace App\Services;

use App\Repositories\CommentRepository;
use Illuminate\Support\Facades\Auth;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Ramsey\Uuid\Type\Integer;


class CommentService
{
    /**
     * @var CommentRepository
     */

    protected CommentRepository $commentRepository;


    /**
     * @param CommentRepository $commentRepository
     */
    public function __construct(CommentRepository $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getById($id)
    {
        return $this->commentRepository->commentById($id);
    }

    public function getCommentById($id)
    {
        return $this->commentRepository->getCommentId($id);
    }

    /**
     * @param string $content
     * @return mixed
     */
    public function store(string $content,  $blogId): mixed
    {
        $userId = Auth::user()->id;

        return $this->commentRepository->store($content, $blogId, $userId);
    }

    public function update($id, $content)
    {
        if ($id){
            return $this->commentRepository->update($id, $content);
        }
    }

    public function delete($id)
    {
        $this->commentRepository->delete($id);
    }

    public function commentReplay($content, $parentId, $blogId)
    {
        $userId = Auth::user()->id;
        return $this->commentRepository->commentReplay($content, $parentId, $blogId, $userId);
    }
}
