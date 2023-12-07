<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Property;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create('fr_FR');

        for($i =0 ;$i < 10;$i++){
            Property::create([
                'title' =>$faker-> sentence($nbWords = 3 ),
                'description' => $faker->text($maxNbChars = 200),
                'surface' =>$faker->numberBetween($min = 20, $max = 350),
                'rooms' => $faker->numberBetween($min = 1, $max = 10),
                'bedrooms' => $faker->numberBetween($min = 1, $max = 10),
                'floor' => $faker->numberBetween($min = 0, $max = 10),
                'price' => $faker->numberBetween($min = 10000, $max = 1000000),
                'city' => $faker->city,
                'address' => $faker->address,
                'postal_code' => $faker->numberBetween($min = 10000, $max = 90000),
                'sold' => $faker->boolean(),
            ]);
        }

    }
}
