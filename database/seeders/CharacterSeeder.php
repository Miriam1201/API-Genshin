<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class CharacterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $baseJsonPath = storage_path('app/public/data/characters');
        $baseImagePath = storage_path('app/public/images/characters');
        $baseUrl = config('app.url') . '/storage/';

        $characterDirs = File::directories($baseJsonPath);

        foreach ($characterDirs as $characterDir) {
            $jsonFilePath = $characterDir . DIRECTORY_SEPARATOR . 'en.json';
            if (File::exists($jsonFilePath)) {
                $jsonContent = File::get($jsonFilePath);
                $characterData = json_decode($jsonContent, true);

                if ($characterData) {
                    $characterId = basename($characterDir);

                    // Validar y manejar el cumpleaños inválido o desconocido
                    $birthday = $characterData['birthday'] ?? null;
                    if ($birthday === "Unknown") {
                        $birthday = null;
                    } elseif (strpos($birthday, '0000') === 0) {
                        $birthday = '1980' . substr($birthday, 4);
                    }

                    if ($birthday === '1980-02-29') {
                        $birthday = '1980-02-28';
                    }

                    // Buscar carpeta de imágenes
                    $imageDir = $baseImagePath . DIRECTORY_SEPARATOR . $characterId;
                    $images = null;

                    if (File::exists($imageDir)) {
                        $imageFiles = File::files($imageDir);
                        // Renombrar los archivos y construir URLs completas
                        $images = collect($imageFiles)->map(function ($file) use ($characterId, $baseUrl) {
                        $originalFilename = $file->getFilename(); // Nombre original
                    
                        // Verificar si ya tiene la extensión .png
                        if (!str_ends_with($originalFilename, '.png')) {
                            $newFilename = $originalFilename . '.png'; // Añadir la extensión .png
                    
                            // Renombrar físicamente el archivo si aún no tiene la extensión
                            $newPath = $file->getPath() . DIRECTORY_SEPARATOR . $newFilename;
                            if (!File::exists($newPath)) {
                                File::move($file->getPathname(), $newPath);
                            }
                    
                            // Devolver la URL completa con el nuevo nombre
                            return $baseUrl . 'images/characters/' . $characterId . '/' . $newFilename;
                        }
                    
                        // Devolver la URL completa con el nombre original si ya tiene .png
                        return $baseUrl . 'images/characters/' . $characterId . '/' . $originalFilename;
                        })->toArray();
                    }

                    // Insertar los datos del personaje en la base de datos
                    DB::table('characters')->insert([
                        'id' => $characterId,
                        'name' => $characterData['name'],
                        'title' => $characterData['title'] ?? null,
                        'vision' => $characterData['vision'] ?? null,
                        'weapon' => $characterData['weapon'] ?? null,
                        'gender' => $characterData['gender'] ?? null,
                        'nation' => $characterData['nation'] ?? null,
                        'affiliation' => $characterData['affiliation'] ?? null,
                        'rarity' => $characterData['rarity'] ?? null,
                        'release' => $characterData['release'] ?? null,
                        'constellation' => $characterData['constellation'] ?? null,
                        'birthday' => $birthday,
                        'description' => $characterData['description'] ?? null,
                        'images' => $images ? json_encode($images) : null, // Guardar imágenes como JSON
                    ]);

                    // Inserta otros datos relacionados (habilidades, talentos, etc.)
                }
            }
        }
    }
}
