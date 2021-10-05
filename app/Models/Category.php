<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

class Category extends Model
{
    use HasFactory;

	

    protected  $table = "categories";//name_table

	protected $fillable = [
		'title', 'description'
	];
	
	public function news(): HasMany
	{
		return $this->hasMany(News::class, 'category_id', 'id');
	}

	public  function getTableName(){
		return $this->table;
	}

	// public function getCategories()
	// {
	// 	return \DB::table($this->table)->get();
	// }

	// public function getCategoryById(int $id)
	// {
    //    return \DB::table($this->table)->find($id);
	// }
}
