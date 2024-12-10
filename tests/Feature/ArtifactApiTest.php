<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Artifact;

class ArtifactApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_get_single_artifact()
    {
        // Seeders: Asegúrate de que los artefactos están insertados en la base de datos
        $this->seed(\Database\Seeders\ArtifactSeeder::class);

        // Selecciona un artefacto existente
        $artifact = Artifact::first();

        // Verifica que la API devuelva los datos correctos para ese artefacto
        $response = $this->getJson("/api/artifacts/{$artifact->id}");

        $response->assertStatus(200)
            ->assertJsonFragment([
                'id' => $artifact->id,
                'name' => $artifact->name,
                'max_rarity' => $artifact->max_rarity,
                '2_piece_bonus' => $artifact->{'2_piece_bonus'},
                '4_piece_bonus' => $artifact->{'4_piece_bonus'},
            ]);
    }
}