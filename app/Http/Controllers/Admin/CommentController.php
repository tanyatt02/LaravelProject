<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\HTTP\Requests\CommentUpdateRequest;
use App\Models\Comment;
use App\Models\News;
use Illuminate\Pagination\Paginator;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginator = new Paginator(News::orderBy('updated_at', 'desc'), config('news.paginateAdmin'));
        return view('admin.comments.index', [
            'commentsList' => Comment::orderBy('updated_at', 'desc')->with('news')->paginate(config('news.paginateAdmin')),//$this->getNews()
            'newsList' => news::get(),
            'paginator' => $paginator->withPath('/admin/comments'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        return view('admin.comments.edit', ['comment' => $comment, 'newsList' => News::get(),'news_id' => $comment->news_id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CommentUpdateRequest $request, Comment $comment)
    {
        $comment = $comment->fill($request->validated())->save();
		if( $comment ) {
			return redirect()
				->route('admin.comments.index')
				->with('success', __('messages.admin.comments.update.success'));
		}

		return back()
			->with('error', __('messages.admin.comments.update.fail'))
			->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment, Request $request)
    {
        if($request->ajax()) {
            try {
                $comment->delete();
                return response()->json(['message' => 'ok']);
  
            } catch (\Exception $e) {
                \Log::error("Error delete comment" . PHP_EOL, [$e]);
                return response()->json(['message' => 'e.message'], 400);
            }
        }
    }
}
