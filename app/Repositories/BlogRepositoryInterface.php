<?php

namespace  App\Repositories;

interface BlogRepositoryInterface
{
    public function getAllBlog();
    public function store($title, $content);
    public function edit($id);
    public function updateBlog($id, $title, $content);
    public function deleteBlog($id);
    public function findUserBlogs($id);
}
