<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $typeIds = Type::all()->pluck('id');
        $status = ['In Progress', 'Ended'];
        for ($i = 0; $i < 40; $i++) {
            $newProject = new Project();
            $newProject->type_id = $faker->randomElement($typeIds);
            $newProject->title = $faker->sentence(2);
            $newProject->status = $faker->randomElement($status);
            $newProject->image = $faker->imageUrl(360, 360, 'code', true);
            $newProject->start_date = $faker->date();
            $newProject->end_date = $faker->date();
            $newProject->save();
        }
    }
}
