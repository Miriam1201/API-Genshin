<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class WeaponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Base de directorios de datos y de imágenes
        $dataPath = storage_path('app/public/data/weapons');
        $imagePath = storage_path('app/public/images/weapons');
        $baseUrl = '/images/weapons/';

        // Verifica si las carpetas de datos existen
        if (!File::exists($dataPath)) {
            $this->command->error("El directorio de datos ($dataPath) no existe.");
            return;
        }

        // Obtener las carpetas que contienen los JSON de armas
        $folders = File::directories($dataPath);

        foreach ($folders as $folder) {
            $jsonFilePath = $folder . '/en.json';

            // Verifica si existe el archivo JSON en la carpeta
            if (File::exists($jsonFilePath)) {
                $data = json_decode(File::get($jsonFilePath), true);

                if (!$data || !is_array($data)) {
                    $this->command->warn("Datos inválidos en: $jsonFilePath");
                    continue;
                }

                // Genera el ID del arma en base al nombre
                $weaponId = Str::slug($data['name']); // Convierte a un formato slug (id amigable)
                $imageDir = $imagePath . '/' . $weaponId;

                $imageUrl = null;

                // Busca la imagen correspondiente
                if (File::exists($imageDir)) {
                    $imageFiles = File::files($imageDir);
                    foreach ($imageFiles as $file) {
                        $filename = $file->getFilename();

                        // Si el archivo no tiene la extensión .png, se le agrega
                        if (!Str::endsWith($filename, '.png')) {
                            $newFilename = $filename . '.png';
                            $newFilePath = $file->getPath() . '/' . $newFilename;

                            // Renombrar el archivo en el sistema de archivos
                            File::move($file->getPathname(), $newFilePath);

                            $filename = $newFilename; // Actualiza el nombre del archivo
                        }

                        // Construye la URL de la imagen
                        $imageUrl = $baseUrl . $weaponId . '/' . $filename;
                        break; // Utiliza la primera imagen PNG válida
                    }
                }

                // Inserta o actualiza la información del arma
                DB::table('weapons')->upsert(
                    [
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
                            'image' => $imageUrl,
                        ]
                    ],
                    ['id'], // Clave única para evitar duplicados
                    [
                        'name', 'type', 'rarity', 'baseAttack', 'subStat',
                        'passiveName', 'passiveDesc', 'location', 'ascensionMaterial', 'image'
                    ]
                );

                $this->command->info("Arma '{$data['name']}' insertada/actualizada correctamente.");
            } else {
                $this->command->warn("No se encontró el archivo JSON en: $folder");
            }
        }
    }
}
