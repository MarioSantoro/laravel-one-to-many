<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Status;
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
        $statusIds = Status::all()->pluck('id');
        for ($i = 0; $i < 40; $i++) {
            $newProject = new Project();
            $newProject->type_id = $faker->randomElement($typeIds);
            $newProject->status_id = $faker->randomElement($statusIds);
            $newProject->title = $faker->sentence(2);
            $newProject->image = $faker->imageUrl(360, 360, 'code', true);
            $newProject->start_date = $faker->date();
            $newProject->end_date = $faker->date();
            $newProject->save();
        }
    }
}
