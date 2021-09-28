<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    //
    public function index()
    {   //dd($this->getNews());

        
        return view('news.index', [
            'newsList' => $this->getNews(),
            'categoryList' => $this->getCategories(),
        ]);
    }

    public function indexCategory(string $category, int $category_id)
    {
        $model = new News();
        return view('news.indexCategory', [
            'newsList' => $model->getNewsCategory($category_id),
            'categoryList' => $this->getCategories(),
        ]);
    }

    public function show(int $id)
    {
        $model = new News();
        $news = $model->getNewsById($id);
        dd($news);
        // return view('news.show', [
        //     'news' => $news->getNewsById($id),
        //     'categoryList' => $this->getCategories(),
        // ]);
    }
}
// public function show(int $id)
// 	{
// 		return view('news.show', [
// 			'id' => $id
// 		]);
// 	}