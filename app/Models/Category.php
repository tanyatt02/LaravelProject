<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Category extends Model
{
    use HasFactory;

    protected $table = "categories";//name_table

	public function getCategories()
	{
		return \DB::table($this->table)->get();
	}

	public function getCategoryById(int $id)
	{
       return \DB::table($this->table)->find($id);
	}
}
