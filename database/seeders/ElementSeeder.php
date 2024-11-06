<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ElementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $elementsPath = public_path('storage/data/elements');
        $elementDirectories = File::directories($elementsPath);

        foreach ($elementDirectories as $elementDir) {
            $filePath = $elementDir . '/en.json';
            if (File::exists($filePath)) {
                $jsonContent = File::get($filePath);
                $data = json_decode($jsonContent, true);

                // Insertar en la tabla `elements`
                $elementId = Str::slug($data['name'], '-');
                DB::table('elements')->insert([
                    'id' => $elementId,
                    'name' => $data['name'],
                    'key' => $data['key'],
                ]);

                // Insertar en la tabla `elemental_reactions` y `reaction_elements`
                if (isset($data['reactions']) && is_array($data['reactions'])) {
                    foreach ($data['reactions'] as $reaction) {
                        $reactionId = DB::table('elemental_reactions')->insertGetId([
                            'element_id' => $elementId,
                            'reaction_name' => $reaction['name'],
                            'description' => $reaction['description'],
                        ]);

                        if (isset($reaction['elements']) && is_array($reaction['elements'])) {
                            foreach ($reaction['elements'] as $elementName) {
                                DB::table('reaction_elements')->insert([
                                    'reaction_id' => $reactionId,
                                    'element_name' => $elementName,
                                ]);
                            }
                        }
                    }
                }
            }
        }
    }
}
