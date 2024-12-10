<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TeamApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_get_teams_by_sub_dps()
    {
        $this->seed(\Database\Seeders\CharacterSeeder::class);
        $this->seed(\Database\Seeders\TeamSeeder::class);

        // Realizar la solicitud al endpoint con el ID del sub_dps "albedo"
        $response = $this->getJson('/api/teams/albedo');

        // Verifica que la respuesta tenga un estado HTTP 200
        $response->assertStatus(200);

        // Validar la estructura JSON de la respuesta
        $response->assertJsonStructure([
            '*' => [
                'id',
                'main_dps' => [
                    'id',
                    'name',
                    'title',
                    'vision',
                    'weapon',
                    'gender',
                    'nation',
                    'affiliation',
                    'rarity',
                    'release',
                    'constellation',
                    'birthday',
                    'description',
                    'card',
                    'icon_big',
                    'created_at',
                    'updated_at',
                ],
                'sub_dps' => [
                    'id',
                    'name',
                    'title',
                    'vision',
                    'weapon',
                    'gender',
                    'nation',
                    'affiliation',
                    'rarity',
                    'release',
                    'constellation',
                    'birthday',
                    'description',
                    'card',
                    'icon_big',
                    'created_at',
                    'updated_at',
                ],
                'support' => [
                    'id',
                    'name',
                    'title',
                    'vision',
                    'weapon',
                    'gender',
                    'nation',
                    'affiliation',
                    'rarity',
                    'release',
                    'constellation',
                    'birthday',
                    'description',
                    'card',
                    'icon_big',
                    'created_at',
                    'updated_at',
                ],
                'healer_shielder' => [
                    'id',
                    'name',
                    'title',
                    'vision',
                    'weapon',
                    'gender',
                    'nation',
                    'affiliation',
                    'rarity',
                    'release',
                    'constellation',
                    'birthday',
                    'description',
                    'card',
                    'icon_big',
                    'created_at',
                    'updated_at',
                ],
                'created_at',
                'updated_at',
            ],
        ]);

        // Verificar que la respuesta contiene el equipo esperado
        $response->assertJsonFragment([
            "id" => 1,
            "sub_dps" => [
                "id" => "albedo",
                "name" => "Albedo",
                "title" => "Kreideprinz",
                "vision" => "Geo",
                "weapon" => "Sword",
                "gender" => "Male",
                "nation" => "Mondstadt",
                "affiliation" => "Knights of Favonius",
                "rarity" => 5,
                "release" => "2020-12-23",
                "constellation" => "Princeps Cretaceus",
                "birthday" => "1980-09-13",
                "description" => "A genius known as the Kreideprinz, he is the Chief Alchemist and Captain of the Investigation Team of the Knights of Favonius.",
                "card" => "/storage/images/characters/albedo/card.png",
                "icon_big" => "/storage/images/characters/albedo/icon-big.png",
                "created_at" => null,
                "updated_at" => null,
            ],
        ]);
    }
}