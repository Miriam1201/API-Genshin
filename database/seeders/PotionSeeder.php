<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class PotionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Ruta base de los datos JSON para potions
        $baseJsonPath = public_path('storage/data/consumables/potions');

        // Recorre cada archivo JSON en la carpeta de pociones
        $jsonFiles = File::files($baseJsonPath);

        foreach ($jsonFiles as $file) {
            $jsonContent = File::get($file);
            $data = json_decode($jsonContent, true);

            foreach ($data as $key => $item) {
                $id = Str::slug($item['name'], '-');

                // Inserta las potions en la base de datos
                DB::table('potions')->insert([
                    'id' => $id,
                    'name' => $item['name'],
                    'effect' => $item['effect'],
                    'rarity' => $item['rarity'],
                ]);

                // Inserta los requerimientos de fabricación de la poción
                if (isset($item['crafting'])) {
                    foreach ($item['crafting'] as $craftItem) {
                        DB::table('crafting_requirements')->insert([
                            'potion_id' => $id,
                            'item_name' => $craftItem['item'],
                            'quantity' => $craftItem['quantity'],
                        ]);
                    }
                }
            }
        }
    }
}
