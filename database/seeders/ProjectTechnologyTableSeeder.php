<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Technology;

class ProjectTechnologyTableSeeder extends Seeder
{

    public function run(): void
    {
        for ($i = 0; $i < 200; $i++) {

            $project = Project::inRandomOrder()->first();

            $technology = Technology::inRandomOrder()->first();


            if ($project && $technology) {
                $project->technologies()->syncWithoutDetaching([$technology->id]);
            }

        }
    }
}
