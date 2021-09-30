<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Category;
use App\Models\Comment;


use Illuminate\Pagination\Paginator;


class NewsController extends Controller
{
    //
    public function index()
    {   $paginator = new Paginator(News::orderBy('updated_at', 'desc'), config('news.paginate'));
        $lastPage = News::count() / config('news.paginate') ;
        return view('news.index', [
            'newsList' => News::orderBy('updated_at', 'desc')->with('category')->paginate(config('news.paginate')),
            'categoryList' => Category::get(),
            'paginator' => $paginator->withPath('/news'),//(News::orderBy('updated_at', 'desc'), config('news.paginate')),
            'lastPage' => $lastPage,
        ]);
    }

    public function indexCategory(string $category, int $category_id)
    {
        $paginator = new Paginator(News::orderBy('updated_at', 'desc'), config('news.paginate'));
        $lastPage = News::count() / config('news.paginate') ;
        return view('news.indexCategory', [
            'newsList' => News::where('category_id','=',$category_id)->orderBy('updated_at', 'desc')->with('category')->paginate(config('news.paginate')),//getNewsCategory($category_id),
            'categoryList' => Category::get(),
            'paginator' => $paginator->withPath('/news'),//(News::orderBy('updated_at', 'desc'), config('news.paginate')),
            'lastPage' => $lastPage,
        ]);
    }

    public function show(News $news)
    {
        return view('news.show', [
            'news' => $news,
            'categoryList' => Category::get(),
            'commentsList' => Comment::where('news_id','=',$news->id)->orderBy('updated_at', 'desc')->with('news')->get(),
        ]);
    }
}
