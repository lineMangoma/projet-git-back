<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use League\CommonMark\Extension\Table\Table;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        // \App\Models\User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'gigi',
        //     'email' => 'ggig19@gmail.com',
        //     'password' => Hash::make('password'),
        // ]);
        // User::factory(20)->create();
        // $this->call(CategorySeeder::class);
        // $this->call(TagsSeeder::class);
   

        


        $this->call(ArcticleSeeder::class);

        // $this->call(CommentSeeder::class);


    }
}