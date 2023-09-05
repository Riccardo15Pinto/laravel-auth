<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = config('project');
        foreach ($data as $item) {

            $project = new Project();
            $project->name_project = $item['name_project'];
            $project->slug = Str::slug($item['name_project'], '-');
            $project->url_project = $item['url_project'];
            $project->description_project = $item['description_project'];
            $project->image = $item['image'];
            $project->type_project = $item['type_project'];

            $project->save();
        }
    }
}
