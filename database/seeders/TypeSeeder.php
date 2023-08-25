<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;


class TypeSeeder extends Seeder
{
    public function run(Faker $faker): void
    {
        $types = ['Front-End', 'Back-End', 'Full-Stack'];
        foreach ($types as $type) {
            $newTypes = new Type();
            $newTypes->name = $type;
            $newTypes->save();
        }
    }
}
