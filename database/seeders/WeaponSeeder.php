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
        // Base de directorios de datos y de imágenes
        $dataPath = base_path('public/storage/data/weapons');
        $imagePath = base_path('public/storage/images/weapons');
        $baseUrl = 'http://10.0.2.2:8000/storage/images/weapons/';

        // Obtener las carpetas que contienen los JSON de armas
        $folders = File::directories($dataPath);

        foreach ($folders as $folder) {
            $path = $folder . '/en.json';

            if (File::exists($path)) {
                $data = json_decode(File::get($path), true);

                // Obtener las imágenes del arma
                $weaponId = strtolower(str_replace(' ', '-', $data['name']));
                $imageDir = $imagePath . '/' . $weaponId;

                $imageUrl = null;

                if (File::exists($imageDir)) {
                    $imageFiles = File::files($imageDir);
                    foreach ($imageFiles as $file) {
                        $filename = $file->getFilename();
                        if (str_ends_with($filename, '.png')) {
                            $imageUrl = $baseUrl . $weaponId . '/' . $filename;
                            break; // Asumimos que sólo necesitamos una imagen por arma
                        }
                    }
                }

                // Utilizar upsert para evitar duplicados
                DB::table('weapons')->upsert([
                    [
                        'id' => $weaponId,
                        'name' => $data['name'],
                        'type' => $data['type'],
                        'rarity' => $data['rarity'],
                        'baseAttack' => $data['baseAttack'],
                        'subStat' => $data['subStat'],
                        'passiveName' => $data['passiveName'],
                        'passiveDesc' => $data['passiveDesc'],
                        'location' => $data['location'],
                        'ascensionMaterial' => $data['ascensionMaterial'],
                        'image' => $imageUrl, // Añadir la URL de la imagen
                    ]
                ], ['id'], ['name', 'type', 'rarity', 'baseAttack', 'subStat', 'passiveName', 'passiveDesc', 'location', 'ascensionMaterial', 'image']);
            }
        }
    }
}