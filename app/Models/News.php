<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

class News extends Model
{
    protected $table = "news";
    
    protected $fillable = [
	   'category_id', 'title', 'author', 'description'
   ];

   

   public function category(): BelongsTo
   {
	   return $this->belongsTo(Category::class, 'category_id', 'id');
   }

   public function comment(): HasMany
	{
		return $this->hasMany(Comment::class, 'news_id', 'id');
	}

   public function getNews()
   {
      

	   // return \DB::table($this->table)
      //       ->join('categories', 'categories.id', '=', 'news.category_id')
      //       ->select("news.*","categories.id as categoryId","categories.title as categoryTitle")
		//       ->get();
   }

   public function getNewsCategory(int $category_id)
   {
      
      
      // return \DB::table($this->table)
      //   ->join('categories', 'categories.id', '=', 'news.category_id')
      //   ->select("news.*","categories.id as categoryId","categories.title as categoryTitle")
      //   ->where('news.category_id', '=', $category_id)
      //    ->orderBy('news.id', 'desc')
      //    ->get();
   }
   
   // public function getNewsById(int $id)
   // {
	//    return \DB::table($this->table)->find($id);
   // }
   
}
