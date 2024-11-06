<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $materials = [
            'boss-material' => 'boss_materials',
            'character-ascension' => 'character_ascension',
            'character-experience' => 'character_experience',
            'common-ascension' => 'common_ascension',
            'cooking-ingredients' => 'cooking_ingredients',
            'local-specialties' => 'local_specialties',
            'talent-book' => 'talent_book',
            'talent-boss' => 'talent_boss',
            'weapon-ascension' => 'weapon_ascension',
            'weapon-experience' => 'weapon_experience',
        ];

        foreach ($materials as $folder => $table) {
            $path = base_path("public/storage/data/materials/{$folder}/en.json");

            if (!File::exists($path)) {
                continue; // Si el archivo no existe, pasa al siguiente
            }

            $data = json_decode(File::get($path), true);
            if ($data === null) {
                continue; // Si el JSON está vacío o inválido, pasa al siguiente
            }

            switch ($table) {
                case 'boss_materials':
                    foreach ($data as $id => $material) {
                        DB::table($table)->insert([
                            'id' => $id,
                            'name' => $material['name'] ?? 'Unknown',
                            'source' => $material['source'] ?? 'Unknown',
                        ]);
                    }
                    break;

                case 'character_ascension':
                    foreach ($data as $id => $ascension) {
                        DB::table($table)->insert([
                            'id' => $id,
                            'type' => $ascension['type'] ?? 'General',
                            'name' => $ascension['name'] ?? 'Unknown',
                            'sources' => json_encode($ascension['sources'] ?? []),
                            'rarity' => $ascension['rarity'] ?? 0,
                        ]);
                    }
                    break;

                case 'character_experience':
                    if (isset($data['items'])) {
                        foreach ($data['items'] as $experience) {
                            if (isset($experience['id'], $experience['name'], $experience['experience'], $experience['rarity'])) {
                                DB::table($table)->insert([
                                    'id' => $experience['id'],
                                    'name' => $experience['name'],
                                    'experience' => $experience['experience'],
                                    'rarity' => $experience['rarity'],
                                ]);
                            }
                        }
                    }
                    break;

                case 'common_ascension':
                    foreach ($data as $id => $ascension) {
                        DB::table($table)->insert([
                            'id' => $id,
                            'type' => $ascension['type'] ?? 'General', // Proporcionar valor predeterminado si está vacío
                            'characters' => json_encode($ascension['characters'] ?? []),
                            'weapons' => json_encode($ascension['weapons'] ?? []),
                            'items' => json_encode($ascension['items'] ?? []),
                            'sources' => json_encode($ascension['sources'] ?? []),
                        ]);
                    }
                    break;

                case 'cooking_ingredients':
                    foreach ($data as $id => $ingredient) {
                        DB::table($table)->insert([
                            'id' => $id,
                            'name' => $ingredient['name'] ?? 'Unknown',
                            'description' => $ingredient['description'] ?? '',
                            'rarity' => $ingredient['rarity'] ?? 0,
                            'sources' => json_encode($ingredient['sources'] ?? []),
                        ]);
                    }
                    break;

                case 'local_specialties':
                    foreach ($data as $region => $specialties) {
                        foreach ($specialties as $specialty) {
                            DB::table($table)->insert([
                                'id' => $specialty['id'] ?? uniqid(),
                                'region' => $region,
                                'name' => $specialty['name'] ?? 'Unknown',
                                'characters' => json_encode($specialty['characters'] ?? []),
                            ]);
                        }
                    }
                    break;

                case 'talent_book':
                    foreach ($data as $id => $book) {
                        DB::table($table)->insert([
                            'id' => $id,
                            'type' => $book['type'] ?? 'General',
                            'characters' => json_encode($book['characters'] ?? []),
                            'availability' => json_encode($book['availability'] ?? []),
                            'source' => $book['source'] ?? 'Unknown',
                            'items' => json_encode($book['items'] ?? []),
                        ]);
                    }
                    break;

                case 'talent_boss':
                    foreach ($data as $boss) {
                        if (isset($boss['id'], $boss['name'])) {
                            DB::table($table)->insert([
                                'id' => $boss['id'],
                                'name' => $boss['name'],
                                'characters' => json_encode($boss['characters'] ?? []),
                            ]);
                        }
                    }
                    break;

                case 'weapon_ascension':
                    foreach ($data as $id => $ascension) {
                        DB::table($table)->insert([
                            'id' => $id,
                            'weapons' => json_encode($ascension['weapons'] ?? []),
                            'availability' => json_encode($ascension['availability'] ?? []),
                            'source' => $ascension['source'] ?? 'Unknown',
                            'items' => json_encode($ascension['items'] ?? []),
                        ]);
                    }
                    break;

                case 'weapon_experience':
                    if (isset($data['items'])) {
                        foreach ($data['items'] as $experience) {
                            if (isset($experience['id'], $experience['name'], $experience['experience'], $experience['rarity'])) {
                                DB::table($table)->insert([
                                    'id' => $experience['id'],
                                    'name' => $experience['name'],
                                    'experience' => $experience['experience'],
                                    'rarity' => $experience['rarity'],
                                    'source' => json_encode($experience['source'] ?? []),
                                ]);
                            }
                        }
                    }
                    break;
            }
        }
    }
}