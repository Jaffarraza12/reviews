<?php

use Illuminate\Database\Seeder;
use App\Http\Models\Review;

class ReviewTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Review::truncate();

        $faker = \Faker\Factory::create();

        // And now, let's create a few articles in our database:
        for ($i = 0; $i < 76; $i++) {
            Review::create([
                'title' => $faker->name(),
                'review' => $faker->paragraph,
                'vote' => $faker->numberBetween($min = 1, $max = 5) ,
                'quality_vote' => $faker->numberBetween($min = 1, $max = 5) ,
                'performance_vote' => $faker->numberBetween($min = 1, $max = 5) ,
                'features_vote' => $faker->numberBetween($min = 1, $max = 5) ,
                'status' => $faker->numberBetween($min = 0, $max = 1) ,
                'location' => $faker->streetName ,
                'email' => $faker->freeEmail ,
                'nick' => $faker->userName,
            ]);
        }
    }
}
