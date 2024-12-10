<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CharacterSeederTest extends TestCase
{
    use RefreshDatabase;

    public function test_character_seeder_inserts_data_correctly()
    {
        $this->artisan('db:seed --class=CharacterSeeder');

        $this->assertDatabaseHas('characters', [
            'name' => 'Albedo',
        ]);
    }
}