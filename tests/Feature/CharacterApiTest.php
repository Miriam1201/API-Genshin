<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Character;

class CharacterApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_get_all_characters()
    {

        // Crear datos de prueba
        Character::factory()->create(['id' => 'arataki-itto', 'name' => 'Arataki Itto']);
        Character::factory()->create(['id' => 'albedo', 'name' => 'Albedo']);

        // Realizar petición
        $response = $this->getJson('/api/characters');

        // Verificar respuesta
        $response->assertStatus(200)
            ->assertJsonCount(2)
            ->assertJsonFragment(['name' => 'Arataki Itto'])
            ->assertJsonFragment(['name' => 'Albedo']);
    }
}