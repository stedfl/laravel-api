<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i=0; $i<50; $i++) {
            $new_project = new Project();
            $new_project->name = $faker->word(2, true);
            $new_project->slug = Project::generateSlug($new_project->name);
            $new_project->client_name = $faker->company();
            $new_project->summary = $faker->sentence(5);
            $new_project->cover_image = 'https://media.istockphoto.com/id/1147544807/vector/thumbnail-image-vector-graphic.jpg?s=612x612&w=0&k=20&c=rnCKVbdxqkjlcs3xH87-9gocETqpspHFXu5dIGB4wuM=';
            $new_project->save();
        }
    }
}
