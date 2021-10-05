<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\HTTP\Requests\CategoryRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.categories.index', [
            'categoriesList' => Category::withCount('news')->orderBy('updated_at', 'desc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        
        
        $category = Category::create($request->validated());

        
        if( $category ) {
			return redirect()
				->route('admin.categories.index')
				->with('success', __('messages.admin.categoris.create.success'));
		}

		return back()
			->with('error', __('messages.admin.categories.create.fail'))
			->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $category = $category->fill(
			$request->validated())
		    ->save();

		if($category) {
			return redirect()
			    ->route('admin.categories.index')
				->with('success', __('messages.admin.categoris.update.success'));
		}

		return back()
			->with('error', __('messages.admin.categories.create.fail'))
			->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category, Request $request)
    {
        if($request->ajax()) {
            try {
                $category->delete();
                return response()->json(['message' => 'ok']);
  
            } catch (\Exception $e) {
                \Log::error("Error delete news" . PHP_EOL, [$e]);
                return response()->json(['message' => 'e.message'], 400);
            }
        }
    }
}
