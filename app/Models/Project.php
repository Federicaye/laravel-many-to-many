<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'link', 'slug', 'technology', 'description', 'date_creation', 'img', 'category_id'];
   
    public static function generateSlug($name)
    {
        $slug = Str::slug($name, '-');
        $count = 1;
        while (Project::where('slug', $slug)->first()) {
            $slug = Str::of($name)->slug('-') . "-{$count}";
            $count++;
        }
        return $slug;}

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function technologies() {
        return $this->belongsToMany(Technology::class);
    }
}
