<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class WeaponSeederTest extends TestCase
{
    use RefreshDatabase;

    public function test_weapon_seeder_inserts_data_correctly()
    {
        $this->artisan('db:seed --class=WeaponSeeder');

        $this->assertDatabaseHas('weapons', [
            'name' => 'Skyward Blade',
        ]);
    }
}