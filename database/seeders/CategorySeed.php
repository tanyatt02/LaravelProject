<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Faker\Factory;

class CategorySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       \DB::table('categories')->insert($this->getData());
    }

	private function getData(): array
	{
		$faker = Factory::create();
		$data = [];
		for($i = 0; $i < 10; $i++) {
			$data[] = [
				'title' => $faker->sentence(mt_rand(1,3)),
				'description' => $faker->text(mt_rand(50, 100)),
				'updated_at' => now(),
				'created_at' => now()
			];
		}

		return $data;
	}
}
