<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category

class CategoryController extends Controller
{
    public function index()
    {   
        $model = new Category();
        return view('categories.index', [
            'categoriesList' => $model->getCategories()
        ]);
    }
}

