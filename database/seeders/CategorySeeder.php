<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::all()->each(function ($user){
            $defaultCategories = [
                'work',
                'Personal',
                'Study',
                'health'
            ];
            foreach ($defaultCategories as $name){
                Category::firstOrCreate([
                    'name' => $name,
                    'user_id' => $user->id
                ]);
            }
        });
    }
}
