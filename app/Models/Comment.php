<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Collection;

class Comment extends Model
{
    use HasFactory;

    protected $table = "comments";

    public  function getTableName(){
		return $this->table;
	}
    
    protected $fillable = [
	   'news_id', 'title', 'author', 'description',
   ];

   public function news(): BelongsTo
   {
	   return $this->belongsTo(News::class, 'news_id', 'id');
   }
}
