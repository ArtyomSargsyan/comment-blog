<?php

namespace App\Http\Controllers;


use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use App\Services\BlogService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;



class BlogController extends Controller
{

    protected BlogService $blogService;

    /**
     * @param BlogService $blogService
     */
    public function __construct(BlogService $blogService)
    {
        $this->blogService = $blogService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $blogs = $this->blogService->getAll();

        return view('admin.index')->with([
            'blogs' => $blogs
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('blogs.create');
    }

    /**
     * @param BlogRequest $request
     * @return RedirectResponse
     */
    public function store(BlogRequest $request): RedirectResponse
    {

        $this->blogService->blogStore($request->input('title'), $request->input('content'));

        session()->flash('success', 'Your blog create successfully');
        return Redirect::to('/admin');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog, $id): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {

        $blog = $this->blogService->getBlogById($id);

        return view('blogs.edit')->with([
            'blog' => $blog,

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogRequest $request): RedirectResponse
    {

        $this->blogService->update($request->input('id'),$request->input('title'), $request->input('content'));

        session()->flash('success', 'Your blog update successfully');
        return Redirect::to('/admin');
    }

    /**
     * @param Blog $blog
     * @param $id
     * @return RedirectResponse
     */
    public function destroy(Blog $blog, $id): RedirectResponse
    {
        $this->blogService->delete($id);

        return redirect()->back();
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View|Application
     */
    public function allUserBlogs($id): Application|View|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $blogs = $this->blogService->allUserBlogs($id);

        return view('user.blogs')->with([
            'blogs' => $blogs
        ]);
    }


}
