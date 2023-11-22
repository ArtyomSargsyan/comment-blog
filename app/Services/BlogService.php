<?php

namespace App\Services;

use App\Repositories\BlogRepository;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;


class BlogService
{
    /**
     * @var BlogRepository
     */
    protected BlogRepository $blogRepository;


    /**
     * @param BlogRepository $blogRepository
     */
    public function __construct(BlogRepository $blogRepository)
    {
        $this->blogRepository = $blogRepository;
    }

    /**
     * @return mixed
     */
    public function getAll(): mixed
    {
        return $this->blogRepository->getAllBlog();
    }

    /**
     * @param string $title
     * @param string $content
     * @return void
     *
     *
     */
    public function blogStore(string $title, string $content)
    {
        return $this->blogRepository->store($title, $content);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getBlogById($id)
    {
        return $this->blogRepository->edit($id);
    }

    /**
     * @param $id
     * @param $title
     * @param $content
     * @return void
     */
    public function update($id,  $title, $content)
    {
        return $this->blogRepository->updateBlog($id, $title, $content);
    }

    /**
     * @param $id
     * @return void
     */
    public function delete($id)
    {
        if ($id)
        {
            return $this->blogRepository->deleteBlog($id);
        }

    }

    /**
     * @param $id
     * @return mixed
     */
    public function allUserBlogs($id)
    {
        return $this->blogRepository->findUserBlogs($id);
    }



}
