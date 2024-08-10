<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use MoonShine\Models\MoonshineUser;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        MoonshineUser::factory()->create([
            'moonshine_user_role_id' => 1,
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            'name' => 'Admin',
        ]);

        Category::factory(10)->create();
        Tag::factory(30)->create();
        Article::factory(30)->create();
    }
}
