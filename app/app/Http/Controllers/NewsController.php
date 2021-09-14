<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    //
    public function index()
    {
        return view('news.index', [
            'newsList' => $this->getNews(),
            'categoryList' => $this->categories
        ]);
    }

    public function indexCategory(string $category, int $category_id)
    {
        return view('news.indexCategory', [
            'newsList' => $this->getNewsCategory($category_id),
            'categoryList' => $this->categories
        ]);
    }

    public function show(int $id)
    {
        return view('news.show', [
            'id' => $id,
            'categoryList' => $this->categories
        ]);
    }


public function comment()
    {
        return view('news.comment');
    }

public function store(Request $request)
    {
        $request->validate([
			'author' => ['required', 'string', 'min:3'],
            'comment' => ['required', 'string']
		]);
         
		return redirect()->route('news');
    }
}
