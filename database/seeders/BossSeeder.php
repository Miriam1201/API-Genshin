<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class BossSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Ruta base de los datos JSON
        $baseJsonPath = storage_path('app/public/data/boss/weekly-boss');

        // Recorre cada carpeta de boss
        $bossDirs = File::directories($baseJsonPath);

        foreach ($bossDirs as $bossDir) {
            // Lee el archivo JSON dentro de la carpeta del boss
            $jsonFiles = File::files($bossDir);
            foreach ($jsonFiles as $jsonFile) {
                if ($jsonFile->getExtension() === 'json') {
                    $jsonContent = File::get($jsonFile);
                    $bossData = json_decode($jsonContent, true);

                    if ($bossData) {
                        // Inserta el boss en la base de datos
                        $bossId = basename($bossDir);
                        DB::table('bosses')->insert([
                            'id' => $bossId,
                            'name' => $bossData['name'],
                            'description' => $bossData['description'],
                        ]);

                        // Inserta los drops en la base de datos
                        if (isset($bossData['drops']) && is_array($bossData['drops'])) {
                            foreach ($bossData['drops'] as $drop) {
                                DB::table('drops')->insert([
                                    'boss_id' => $bossId,
                                    'name' => $drop['name'],
                                    'rarity' => $drop['rarity'],
                                    'source' => $drop['source'] ?? null,
                                ]);
                            }
                        }

                        // Inserta los artifacts en la base de datos
                        if (isset($bossData['artifacts']) && is_array($bossData['artifacts'])) {
                            foreach ($bossData['artifacts'] as $artifact) {
                                DB::table('boss_artifacts')->insert([
                                    'boss_id' => $bossId,
                                    'name' => $artifact['name'],
                                    'max_rarity' => $artifact['max_rarity'],
                                ]);
                            }
                        }
                    } else {
                        echo "Advertencia: Datos incompletos en archivo: {$jsonFile->getPathname()}\n";
                    }
                }
            }
        }
    }
}
