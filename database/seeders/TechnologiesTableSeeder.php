<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Functions\Helper as Help;
use App\Models\Technology;

class TechnologiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i=0; $i <10  ; $i++){
            $new_technology = new Technology();
            $new_technology->name = $faker->word(5, true);
            $new_technology->slug = Help::createSlug($new_technology->name, Technology::class);
            $new_technology->save();
        }
    }
}
