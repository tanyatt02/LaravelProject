<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class News extends Model
{
    protected $table = "news";

   public function getNews()
   {

	   return \DB::table($this->table)
            ->join('categories', 'categories.id', '=', 'news.category_id')
		    ->select("news.*","categories.id as categoryId","categories.title as categoryTitle")
		//    ->whereBetween('news.id', [1,5])
		   /*->where([
			   ['news.id', '>', 6],
			   ['categories.id', '<', 2]
		   ])*/

		//   ->orWhere('news.title', 'like', '%'.request()->get('query').'%')
		   ->orderBy('news.id', 'desc')
		   ->get();
   }

   public function getNewsCategory(int $category_id)
   {
        return \DB::table($this->table)
        ->join('categories', 'categories.id', '=', 'news.category_id')
        ->select("news.*","categories.id as categoryId","categories.title as categoryTitle")
        ->where('news.category_id', '=', $category_id)
   /*->where([
       ['news.id', '>', 6],
       ['categories.id', '<', 2]
   ])*/

//   ->orWhere('news.title', 'like', '%'.request()->get('query').'%')
   ->orderBy('news.id', 'desc')
   ->get();
   }
   
   public function getNewsById(int $id)
   {
	   return \DB::table($this->table)->find($id);
   }
}
