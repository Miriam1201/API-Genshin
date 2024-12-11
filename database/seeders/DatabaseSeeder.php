<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Team;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
        ]);

        $this->call([
            ArtifactSeeder::class,
            // BossSeeder::class,
            CharacterSeeder::class,
            // DomainSeeder::class,
            // ElementSeeder::class,
            // EnemySeeder::class,
            // MaterialSeeder::class,
            // NationSeeder::class,
            WeaponSeeder::class,
            CharacterArtifactSeeder::class,
            TeamSeeder::class
        ]);
    }
}