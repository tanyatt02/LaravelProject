<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Faker\Factory;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $categories = ['Политика','Экономика','Спорт','Рынки','Кошки'];
    
    protected function getNews():array
    {
        $faker = Factory::create('ru_RU');

        $data = [];

        $countNews = mt_rand(7, 15);

        for($i = 0; $i < $countNews; $i++) {
            //$cat = mt_rand(0, 4);
            $data[] = [
                'id' => $i+1,
                'category_id' => mt_rand(0, 4),
                'title' => $faker->jobTitle(),
                'description' => $faker->sentence(3),
                'author' => $faker->name(),
                'created_at' => now()
            ] ;
        } ;
        return $data;
    }

    protected function getNewsCategory(int $category_id):array
    {
        $data = [];
        foreach($this->getNews() as $item){
            if($item['category_id'] == $category_id) $data[] = $item;
        }
        return $data;
    }

    protected function getCategories()
    {
        return $this->categories;
    }
}
