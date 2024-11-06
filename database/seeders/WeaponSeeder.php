<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class WeaponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Obtener las carpetas que contienen los JSON de armas
        $folders = File::directories(base_path('public/storage/data/weapons'));

        foreach ($folders as $folder) {
            $path = $folder . '/en.json';

            if (File::exists($path)) {
                $data = json_decode(File::get($path), true);

                // Utilizar upsert para evitar duplicados
                DB::table('weapons')->upsert([
                    [
                        'id' => strtolower(str_replace(' ', '-', $data['name'])),
                        'name' => $data['name'],
                        'type' => $data['type'],
                        'rarity' => $data['rarity'],
                        'baseAttack' => $data['baseAttack'],
                        'subStat' => $data['subStat'],
                        'passiveName' => $data['passiveName'],
                        'passiveDesc' => $data['passiveDesc'],
                        'location' => $data['location'],
                        'ascensionMaterial' => $data['ascensionMaterial'],
                    ]
                ], ['id'], ['name', 'type', 'rarity', 'baseAttack', 'subStat', 'passiveName', 'passiveDesc', 'location', 'ascensionMaterial']);
            }
        }
    }
}
