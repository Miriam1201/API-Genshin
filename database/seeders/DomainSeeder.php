<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class DomainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $domainDirs = File::directories(public_path('storage/data/domains'));

        foreach ($domainDirs as $dir) {
            $jsonPath = $dir . '/en.json';

            if (!File::exists($jsonPath)) {
                continue;
            }

            $jsonContent = File::get($jsonPath);
            $data = json_decode($jsonContent, true);

            // Insert domain
            $domainId = Str::slug($data['name'], '-');
            DB::table('domains')->insert([
                'id' => $domainId,
                'name' => $data['name'],
                'type' => $data['type'] ?? null,
                'description' => $data['description'] ?? null,
                'location' => $data['location'] ?? null,
                'nation' => $data['nation'] ?? null,
            ]);

            // Insert requirements
            foreach ($data['requirements'] as $requirement) {
                DB::table('domain_requirements')->insert([
                    'domain_id' => $domainId,
                    'level' => $requirement['level'],
                    'adventure_rank' => $requirement['adventureRank'],
                    'recommended_level' => $requirement['recommendedLevel'],
                    'ley_line_disorder' => implode(', ', $requirement['leyLineDisorder']),
                ]);
            }

            // Insert rewards
            foreach ($data['rewards'] as $reward) {
                $day = $reward['day'];
                foreach ($reward['details'] as $detail) {
                    $drops = $detail['drops'] ?? $detail['items'] ?? [];

                    foreach ($drops as $drop) {
                        DB::table('domain_rewards')->insert([
                            'domain_id' => $domainId,
                            'day' => $day,
                            'level' => $detail['level'],
                            'adventure_experience' => $detail['adventureExperience'],
                            'companionship_experience' => $detail['companionshipExperience'],
                            'mora' => $detail['mora'],
                            'item_name' => $drop['name'],
                            'drop_min' => $drop['drop_min'],
                            'drop_max' => $drop['drop_max'],
                        ]);
                    }
                }
            }
        }
    }
}
