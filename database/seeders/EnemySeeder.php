<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EnemySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $enemiesPath = public_path('storage/data/enemies');
        $enemyDirectories = File::directories($enemiesPath);

        foreach ($enemyDirectories as $enemyDir) {
            $filePath = $enemyDir . '/en.json';
            if (File::exists($filePath)) {
                $jsonContent = File::get($filePath);
                $data = json_decode($jsonContent, true);

                // Insertar en la tabla `enemies`
                $enemyId = $data['id'];
                $existingEnemy = DB::table('enemies')->where('id', $enemyId)->first();

                if (!$existingEnemy) {
                    $moraGained = isset($data['mora-gained']) && $data['mora-gained'] !== 'None' ? $data['mora-gained'] : null;

                    DB::table('enemies')->insert([
                        'id' => $enemyId,
                        'name' => $data['name'],
                        'description' => $data['description'] ?? null,
                        'region' => $data['region'] ?? null,
                        'type' => $data['type'] ?? null,
                        'family' => $data['family'] ?? null,
                        'faction' => $data['faction'] ?? null,
                        'mora_gained' => $moraGained,
                    ]);
                }

                // Insertar en la tabla `enemy_elements`
                if (isset($data['elements']) && is_array($data['elements'])) {
                    foreach ($data['elements'] as $element) {
                        $existingElement = DB::table('enemy_elements')
                            ->where('enemy_id', $enemyId)
                            ->where('element', $element)
                            ->first();

                        if (!$existingElement) {
                            DB::table('enemy_elements')->insert([
                                'enemy_id' => $enemyId,
                                'element' => $element,
                            ]);
                        }
                    }
                }

                // Insertar en la tabla `enemy_drops`
                if (isset($data['drops']) && is_array($data['drops'])) {
                    foreach ($data['drops'] as $drop) {
                        $existingDrop = DB::table('enemy_drops')
                            ->where('enemy_id', $enemyId)
                            ->where('drop_name', $drop['name'])
                            ->where('rarity', $drop['rarity'])
                            ->where('minimum_level', $drop['minimum-level'])
                            ->first();

                        if (!$existingDrop) {
                            DB::table('enemy_drops')->insert([
                                'enemy_id' => $enemyId,
                                'drop_name' => $drop['name'],
                                'rarity' => $drop['rarity'],
                                'minimum_level' => $drop['minimum-level'],
                            ]);
                        }
                    }
                }

                // Insertar en la tabla `enemy_artifacts`
                if (isset($data['artifacts']) && is_array($data['artifacts'])) {
                    foreach ($data['artifacts'] as $artifact) {
                        $existingArtifact = DB::table('enemy_artifacts')
                            ->where('enemy_id', $enemyId)
                            ->where('artifact_name', $artifact['name'])
                            ->where('set_name', $artifact['set'])
                            ->where('rarity', $artifact['rarity'])
                            ->first();

                        if (!$existingArtifact) {
                            DB::table('enemy_artifacts')->insert([
                                'enemy_id' => $enemyId,
                                'artifact_name' => $artifact['name'],
                                'set_name' => $artifact['set'],
                                'rarity' => $artifact['rarity'],
                            ]);
                        }
                    }
                }

                // Insertar en la tabla `enemy_descriptions`
                if (isset($data['descriptions']) && is_array($data['descriptions'])) {
                    foreach ($data['descriptions'] as $description) {
                        $existingDescription = DB::table('enemy_descriptions')
                            ->where('enemy_id', $enemyId)
                            ->where('description_name', $description['name'])
                            ->first();

                        if (!$existingDescription) {
                            DB::table('enemy_descriptions')->insert([
                                'enemy_id' => $enemyId,
                                'description_name' => $description['name'],
                                'description' => $description['description'],
                            ]);
                        }
                    }
                }
            }
        }
    }
}
