<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'client_name',
        'summary',
        'cover_image'
    ];

    public static function generateSlug($string) {
        $slug = Str::slug($string, '-');
        $original_slug = $slug;

        $existing = Project::where('slug', $slug)->first();
        $c = 1;
        while($existing) {
            $slug = $original_slug . '-' . $c;
            $existing = Project::where('slug', $slug)->first();
            $c++;
        };
        return $slug;
    }
}
