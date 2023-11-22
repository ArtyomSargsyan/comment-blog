<?php

namespace App\Repositories;
use App\Models\Blog;
use Illuminate\Support\Facades\Auth;


class BlogRepository  implements  BlogRepositoryInterface {

    /**
     * @var Blog
     */
    protected Blog $blog;

    public function __construct(Blog $blog)
    {
        $this->blog = $blog;
    }

    /**
     * @return mixed
     */
    public function getAllBlog(): mixed
    {
        return $this->blog->with('user')->orderBy('created_at', 'desc')->paginate(10);
        //$blogs = Blog::with('user')->orderBy('created_at', 'desc')->paginate(10);;
    }

    public function store($title, $content)
    {
        $blog = new $this->blog();
        $blog->title = $title;
        $blog->content = $content;
        $blog->user_id = Auth::user()->id;

        $blog->save();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function edit($id): mixed
    {
        return Blog::findOrFail($id);
    }

    /**
     * @param $id
     * @param $title
     * @param $content
     * @return void
     */
    public function updateBlog($id, $title, $content)
    {
        $blog = $this->blog->find($id);
        $blog->title = $title;
        $blog->content = $content;

        $blog->save();

    }

    /**
     * @param $id
     * @return mixed
     */
    public function deleteBlog($id)
    {
        $blog = $this->blog->find($id);

        return $blog->delete();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function findUserBlogs($id)
    {
        return $this->blog->where('user_id', $id)->get();
    }
}
