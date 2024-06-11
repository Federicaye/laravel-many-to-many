<?php

namespace App\Models;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function projects() {
        return $this->hasMany(Project::class);
    }

    public static function generateSlug($name)
    {
        $slug = Str::slug($name, '-');
        $count = 1;
        while (Category::where('slug', $slug)->first()) {
            $slug = Str::of($name)->slug('-') . "-{$count}";
            $count++;
        }
        return $slug;}
}
