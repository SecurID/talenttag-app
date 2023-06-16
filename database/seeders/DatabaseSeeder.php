<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Event;
use App\Models\EventPlayer;
use App\Models\Player;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
             'name' => 'Test User',
             'email' => 'test@test.com',
             'password' => Hash::make('Test1234'),
         ]);

        Event::factory()->create([
            'host' => 'Eintracht',
            'date' => '01.01.2025 12:00:00'
        ]);
    }
}
