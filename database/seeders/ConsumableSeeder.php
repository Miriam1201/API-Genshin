<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;


class ConsumableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Ruta base de los datos JSON para consumables
        $baseJsonPath = public_path('storage/data/consumables/food');

        // Recorre cada archivo JSON en la carpeta de alimentos
        $jsonFiles = File::files($baseJsonPath);

        foreach ($jsonFiles as $file) {
            $jsonContent = File::get($file);
            $data = json_decode($jsonContent, true);

            foreach ($data as $key => $item) {
                $id = Str::slug($item['name'], '-');

                // Verificar si la proficiencia es un número, de lo contrario establecer en null
                $proficiency = is_numeric($item['proficiency'] ?? null) ? $item['proficiency'] : null;

                // Inserta o actualiza los consumibles en la base de datos
                DB::table('consumables')->updateOrInsert(
                    ['id' => $id], // Condición para buscar duplicados
                    [
                        'name' => $item['name'],
                        'rarity' => $item['rarity'],
                        'type' => $item['type'],
                        'effect' => $item['effect'] ?? null,
                        'has_recipe' => isset($item['recipe']),
                        'description' => $item['description'] ?? null,
                        'proficiency' => $proficiency,
                    ]
                );

                // Si tiene receta, inserta o actualiza los ingredientes de la receta
                if (isset($item['recipe'])) {
                    foreach ($item['recipe'] as $recipeItem) {
                        DB::table('recipes')->updateOrInsert(
                            [
                                'consumable_id' => $id,
                                'item_name' => $recipeItem['item'],
                            ],
                            [
                                'quantity' => $recipeItem['quantity'],
                            ]
                        );
                    }
                }
            }
        }
    }
}
