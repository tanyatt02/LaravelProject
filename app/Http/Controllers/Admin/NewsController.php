<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Category;
use App\Models\News;
use App\HTTP\Requests\NewsCreateRequest;
use App\HTTP\Requests\NewsUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginator = new Paginator(News::orderBy('updated_at', 'desc'), config('news.paginateAdmin'));
        return view('admin.news.index', [
            'newsList' => News::orderBy('updated_at', 'desc')->with('category')->paginate(config('news.paginateAdmin')),//$this->getNews()
            'categoryList' => Category::get(),
            'paginator' => $paginator->withPath('/admin/news'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $categories =  Category::all();
        // return view('admin.news.create', [
		// 	'categories' => $categories
		// ]);
        return view('admin.news.create', [
            'categoriesList' => Category::get(),//$this->getCategories()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsCreateRequest $request)
    {
        
        $news = News::create($request->validated());

		if( $news ) {
			return redirect()
				->route('admin.news.index')
				->with('success', __('messages.admin.news.create.success'));
		}

		return back()
			->with('error', __('messages.admin.news.create.fail'))
			->withInput();
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        return view('admin.news.edit', ['news' => $news, 'categoriesList' => Category::get(),]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NewsUpdateRequest $request, News $news)
    {
        $news = $news->fill($request->validated())->save();
		if( $news ) {
			return redirect()
				->route('admin.news.index')
				->with('success', __('messages.admin.news.update.success'));
		}

		return back()
			->with('error', __('messages.admin.news.update.fail'))
			->withInput();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news, Request $request)
    {
        if($request->ajax()) {
            try {
                $news->delete();
                return response()->json(['message' => 'ok']);
  
            } catch (\Exception $e) {
                \Log::error("Error delete news" . PHP_EOL, [$e]);
                return response()->json(['message' => 'e.message'], 400);
            }
        }
    }
}
