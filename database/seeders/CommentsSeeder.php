<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Faker\Factory;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('comments')->insert($this->getData());
    }

    private function getData(): array
	{
		$faker = Factory::create();
		$data = [];
		for($i = 0; $i < 3; $i++) {
			$data[] = [
				'news_id' => 1,
				'title' => $faker->sentence(mt_rand(3,10)),
				'author' => $faker->lastName(),
				'description' => $faker->text(mt_rand(50, 100)),
				'updated_at' => now(),
				'created_at' => now()
			];
		}

		return $data;
	}
}
