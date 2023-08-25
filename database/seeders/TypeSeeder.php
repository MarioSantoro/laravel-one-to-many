<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;



class TypeSeeder extends Seeder
{
    public function run(): void
    {
        $types = ['Front-End', 'Back-End', 'Full-Stack'];
        foreach ($types as $type) {
            $newTypes = new Type();
            $newTypes->name = $type;
            $newTypes->save();
        }
    }
}
