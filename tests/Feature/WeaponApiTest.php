<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Weapon;

class WeaponApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_get_all_weapons()
    {
        // Seeders: Asegúrate de que las armas están insertadas en la base de datos
        $this->seed(\Database\Seeders\WeaponSeeder::class);

        // Verifica que la API devuelva todas las armas existentes
        $response = $this->getJson('/api/weapons');

        $response->assertStatus(200)
            ->assertJsonStructure([
                '*' => [
                    'id',
                    'name',
                    'type',
                    'rarity',
                ],
            ]);
    }
}