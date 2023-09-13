<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        User::factory(3)->create();

        Category::create([
            'name' => 'Kesehatan',
            'slug' => 'kesehatan'
            ]);
        Category::create([
                'name' => 'Edukasi',
                'slug' => 'edukasi'
            ]);
        Category::create([
                'name' => 'Regulasi',
                'slug' => 'regulasi'
            ]);
        
        
        Post::factory(15)->create();
    }
}
