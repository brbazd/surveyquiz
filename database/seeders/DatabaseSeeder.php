<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Answer;
use App\Models\Question;
use App\Models\Assignment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password098')
            ]);

        // \App\Models\User::factory(10)->create();

        Question::factory(10)->create();

        Answer::factory(20)->create();

        // Answer::factory()->create([
        //     'question_id' => 1,
        //     'body' => 'Test Answer 2',
        //     'value' => '2'
        // ]);

        Assignment::factory(5)->create();
    }
}
