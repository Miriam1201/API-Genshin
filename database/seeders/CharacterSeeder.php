<?php

namespace Database\Seeders;

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

                    // Buscar imágenes específicas
                    $cardImage = null;
                    $iconBigImage = null;

                    $imageDir = $baseImagePath . DIRECTORY_SEPARATOR . $characterId;
                    if (File::exists($imageDir)) {
                        $imageFiles = File::files($imageDir);

                        foreach ($imageFiles as $file) {
                            $filename = $file->getFilename();

                            // Asegurarse de que las rutas usan barras normales
                            $filePath = '/images/characters/' . $characterId . '/' . str_replace('\\', '/', $filename);

                            // Seleccionar la imagen correspondiente según el nombre
                            if ($filename === 'card.png') {
                                $cardImage = $filePath;
                            } elseif ($filename === 'icon-big.png') {
                                $iconBigImage = $filePath;
                            }
                        }
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
                        'card' => $cardImage,
                        'icon_big' => $iconBigImage,
                    ]);

                    foreach ($characterData['skillTalents'] as $skillTalent) {
                        $skillTalentId = DB::table('skill_talents')->insertGetId([
                            'character_id' => $characterId,
                            'name' => $skillTalent['name'],
                            'unlock' => $skillTalent['unlock'] ?? null,
                            'description' => $skillTalent['description'] ?? null,
                            'type' => $skillTalent['type'] ?? null,
                        ]);

                        // Inserta las mejoras de skill talents
                        if (isset($skillTalent['upgrades'])) {
                            foreach ($skillTalent['upgrades'] as $upgrade) {
                                DB::table('skill_upgrades')->insert([
                                    'skill_talent_id' => $skillTalentId,
                                    'name' => $upgrade['name'],
                                    'value' => $upgrade['value'],
                                ]);
                            }
                        }
                    }

                    // Inserta los passive talents
                    if (isset($characterData['passiveTalents'])) {
                        foreach ($characterData['passiveTalents'] as $passiveTalent) {
                            DB::table('passive_talents')->insert([
                                'character_id' => $characterId,
                                'name' => $passiveTalent['name'],
                                'unlock' => $passiveTalent['unlock'] ?? null,
                                'description' => $passiveTalent['description'] ?? null,
                                'level' => $passiveTalent['level'] ?? null,
                            ]);
                        }
                    }

                    // Inserta las constellations
                    if (isset($characterData['constellations'])) {
                        foreach ($characterData['constellations'] as $constellation) {
                            DB::table('constellations')->insert([
                                'character_id' => $characterId,
                                'name' => $constellation['name'],
                                'unlock' => $constellation['unlock'] ?? null,
                                'description' => $constellation['description'] ?? null,
                                'level' => $constellation['level'] ?? null,
                            ]);
                        }
                    }

                    // Inserta los ascension materials
                    if (isset($characterData['ascension_materials'])) {
                        foreach ($characterData['ascension_materials'] as $level => $materials) {
                            foreach ($materials as $material) {
                                DB::table('ascension_materials')->insert([
                                    'character_id' => $characterId,
                                    'level' => $level,
                                    'material_name' => $material['name'],
                                    'value' => $material['value'],
                                ]);
                            }
                        }
                    }
                }
            }
        }
    }
}
