<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ['HTML', 'CSS', 'JavaScript'];
        foreach ($categories as $category) {
            $newTechnology = new Technology();
            $newTechnology->name = $category;
            $newTechnology->slug = Technology::generateSlug($newTechnology->name);
            $newTechnology->save();
    }}
}
