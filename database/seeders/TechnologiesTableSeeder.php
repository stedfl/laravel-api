<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TechnologiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $technologies = [
            [
                'name' => 'Laravel',
                'thumb' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Laravel.svg/985px-Laravel.svg.png',
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/36/Logo.min.svg/2560px-Logo.min.svg.png'
            ],
            [
                'name' => 'Angular',
                'thumb' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/cf/Angular_full_color_logo.svg/2048px-Angular_full_color_logo.svg.png',
                'logo' => 'https://www.vectorlogo.zone/logos/angular/angular-ar21.png'
            ],
            [
                'name' => 'VueJs',
                'thumb' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/95/Vue.js_Logo_2.svg/640px-Vue.js_Logo_2.svg.png',
                'logo' => 'https://www.vectorlogo.zone/logos/vuejs/vuejs-ar21.png'
            ],
            [
                'name' => 'React',
                'thumb' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a7/React-icon.svg/1200px-React-icon.svg.png',
                'logo' => 'https://logos-download.com/wp-content/uploads/2016/09/React_logo_wordmark-700x235.png'
            ],
            [
                'name' => 'JQuery',
                'thumb' => 'https://cdn.worldvectorlogo.com/logos/jquery-4.svg',
                'logo' => 'https://www.vectorlogo.zone/logos/jquery/jquery-ar21.png'
            ],

        ];

        foreach($technologies as $technology) {
            $new_technology = new Technology();
            $new_technology->name = $technology['name'];
            $new_technology->slug = Str::slug($new_technology->name, '-');
            $new_technology->thumb = $technology['thumb'];
            $new_technology->logo = $technology['logo'];
            $new_technology->save();
        }
    }
}
