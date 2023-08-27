<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = ['In Progress', 'Ended'];

        foreach ($statuses as $status) {
            $newStatus = new Status();
            $newStatus->name = $status;
            $newStatus->save();
        };
    }
}
