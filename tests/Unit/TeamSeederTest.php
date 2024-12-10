<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TeamSeederTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test to ensure the TeamSeeder inserts data correctly.
     */
    public function test_team_seeder_inserts_data_correctly()
    {
        $this->seed(\Database\Seeders\CharacterSeeder::class);
        $this->seed(\Database\Seeders\TeamSeeder::class);

        // Verifica un equipo ejemplo directamente de los datos del seeder
        $this->assertDatabaseHas('teams', [
            'main_dps' => 'arataki-itto',
            'sub_dps' => 'albedo',
            'support' => 'gorou',
            'healer_shielder' => 'zhongli',
        ]);

        $this->assertDatabaseHas('teams', [
            'main_dps' => 'aloy',
            'sub_dps' => 'xiangling',
            'support' => 'kazuha',
            'healer_shielder' => 'diona',
        ]);
    }
}