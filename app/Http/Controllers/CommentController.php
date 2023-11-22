<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;

use App\Services\CommentService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use App\Models\Comment;


class CommentController extends Controller
{

    protected CommentService $commentService;

    /**
     * @param CommentService $commentService
     */
    public function __construct(CommentService $commentService)
    {
        $this->commentService = $commentService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index($id): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {

        $blog = $this->commentService->getById($id);

        return view('comments.index')->with([
            'blog' => $blog
        ]);
    }

    /**
     * @param $id
     * @return Factory|Application|View|\Illuminate\Contracts\Foundation\Application
     */
    public function show($id): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $comment = $this->commentService->getCommentById($id);

        return view('comments.show')->with([
            'comment' => $comment
        ]);
    }

    /**
     * @param CommentRequest $request
     * @return RedirectResponse
     */
    public function store(CommentRequest $request): RedirectResponse
    {
        $this->commentService->store($request->input('content'), $request->input('blog_id'));

        session()->flash('success', 'Your comment created successfully');
        return redirect()->back();
    }

    /**
     * @param CommentRequest $request
     * @param Comment $comment
     * @return RedirectResponse
     */
    public function update(CommentRequest $request, Comment $comment): RedirectResponse
    {

        $this->commentService->update($request->input('id'), $request->input('content'));

        session()->flash('success', 'Your comment update successfully');
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment, $id)
    {
        $this->commentService->delete($id);

        session()->flash('success', 'Your comment delete successfully');

        return redirect()->back();

    }

    /**
     * @param CommentRequest $request
     * @return RedirectResponse
     */
    public function replayComment(CommentRequest $request): RedirectResponse
    {

        $this->commentService->commentReplay($request->input('content'), $request->input('parent_id'), $request->input('blog_id'));

        session()->flash('success', 'Your comment created successfully');

        return redirect()->back();
    }
}
