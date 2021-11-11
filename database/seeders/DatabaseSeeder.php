<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        
        // User::create([
        //     'name' => 'Taufiq ALif R',
        //     'username' => 'taufq-alif-r',
        //     'email' => 'aliftaufiq4@gmail.com',
        //     'password' => bcrypt('tcukimay1997')
        // ]);
        
        // User::create([
        //     'name' => 'Anggi Ananda',
        //     'email' => 'anandaanggi87@gmail.com',
        //     'password' => bcrypt('12345')
        // ]);
        User::factory(3)->create();
        
        Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming'
        ]);

        Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        Category::create([
            'name' => 'Programers',
            'slug' => 'programers'
        ]);

        Category::create([
            'name' => 'Desain Grafis',
            'slug' => 'desain-grafis'
        ]);

        Post::factory(3)->create();
    }
}