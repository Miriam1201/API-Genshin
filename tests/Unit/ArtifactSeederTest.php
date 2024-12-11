<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ArtifactSeederTest extends TestCase
{
    use RefreshDatabase;

    public function test_artifact_seeder_inserts_data_correctly()
    {
        $this->artisan('db:seed --class=ArtifactSeeder');

        $this->assertDatabaseHas('artifacts', [
            'name' => 'Gladiator\'s Finale',
        ]);
    }
}