<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class NationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $folders = [
            'fontaine',
            'inazuma',
            'liyue',
            'mondstadt',
            'sumeru',
        ];

        foreach ($folders as $folder) {
            $path = base_path("public/storage/data/nations/{$folder}/en.json");

            if (File::exists($path)) {
                $data = json_decode(File::get($path), true);

                DB::table('nations')->insert([
                    'id' => strtolower(str_replace(' ', '-', $data['name'])),
                    'name' => $data['name'],
                    'element' => $data['element'],
                    'archon' => $data['archon'],
                    'controlling_entity' => $data['controllingEntity'],
                ]);
            }
        }
    }
}
