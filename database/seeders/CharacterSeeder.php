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
                        $birthday = null; // Establece cumpleaños como NULL si es "Unknown"
                    } elseif (strpos($birthday, '0000') === 0) {
                        $birthday = '1980' . substr($birthday, 4); // Reemplaza el año '0000' con '1980'
                    }

                    // Verificar si el cumpleaños es inválido y corregirlo
                    if ($birthday === '1980-02-29') {
                        $birthday = '1980-02-28'; // Cambiar 29 de febrero en un año no bisiesto por 28 de febrero
                    }

                    // Inserta los datos del personaje
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
                    ]);

                    // Inserta los datos de skill talents
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
