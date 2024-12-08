<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Support\Facades\DB;

class WeaponDuplicateTest extends TestCase
{
    public function testNoDuplicateWeapons()
    {
        // Ejecuta el seeder para asegurar datos
        $this->seed(\Database\Seeders\WeaponSeeder::class);

        // Verifica que no haya duplicados en `id`
        $duplicates = DB::table('weapons')
            ->select('id', DB::raw('COUNT(*) as count'))
            ->groupBy('id')
            ->having('count', '>', 1)
            ->get();

        $this->assertTrue($duplicates->isEmpty(), 'Existen duplicados en la tabla weapons');
    }
}