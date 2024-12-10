<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ArtifactSeeder extends Seeder
{
    public function run()
    {
        // Ruta base de los datos JSON
        $baseJsonPath = storage_path('app/public/data/artifacts');
        // Ruta base de las imágenes
        $baseImagePath = storage_path('app/public/images/artifacts');

        // Recorre cada carpeta de artefactos
        $artifactDirs = File::directories($baseJsonPath);

        foreach ($artifactDirs as $artifactDir) {
            // Lee el archivo JSON dentro de la carpeta del artefacto
            $jsonFiles = File::files($artifactDir);
            foreach ($jsonFiles as $jsonFile) {
                if ($jsonFile->getExtension() === 'json') {
                    $jsonContent = File::get($jsonFile);
                    $artifactData = json_decode($jsonContent, true);

                    if ($artifactData) {
                        // Obtiene el nombre de la carpeta del artefacto (que corresponde al ID)
                        $artifactId = basename($artifactDir);

                        // Busca la carpeta de imágenes correspondiente al artefacto
                        $imageDir = $baseImagePath . DIRECTORY_SEPARATOR . $artifactId;
                        $imagePath = null;

                        // Verifica si la carpeta de imágenes existe
                        if (File::exists($imageDir)) {
                            $imageFiles = File::files($imageDir);

                            // Si hay exactamente un archivo de imagen, ajusta la extensión si es necesario
                            if (count($imageFiles) === 1) {
                                $imageFile = $imageFiles[0];
                                $filename = $imageFile->getFilename();

                                // Asegúrate de que tenga la extensión .png
                                if (!str_ends_with($filename, '.png')) {
                                    $filename .= '.png';
                                    $newPath = $imageFile->getPath() . DIRECTORY_SEPARATOR . $filename;

                                    // Renombra el archivo en el sistema de archivos
                                    File::move($imageFile->getPathname(), $newPath);
                                }

                                // Define la ruta relativa que se guardará en la base de datos
                                $imagePath = '/images/artifacts/' . $artifactId . '/' . $filename;
                            }
                        }

                        // Inserta el artefacto en la base de datos
                        DB::table('artifacts')->insert([
                            'id' => $artifactId,
                            'name' => $artifactData['name'],
                            'max_rarity' => $artifactData['max_rarity'],
                            '2_piece_bonus' => array_key_exists('2-piece_bonus', $artifactData) ? $artifactData['2-piece_bonus'] : null,
                            '4_piece_bonus' => array_key_exists('4-piece_bonus', $artifactData) ? $artifactData['4-piece_bonus'] : null,
                            'image_path' => $imagePath,
                        ]);
                    } else {
                        echo "Advertencia: Datos incompletos en archivo: {$jsonFile->getPathname()}\n";
                    }
                }
            }
        }
    }
}
