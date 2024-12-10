<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CharacterArtifactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $characters = [
            'Albedo' => 'Archaic Petra',
            'Alhaitham' => 'Gilded Dreams',
            'Aloy' => 'Blizzard Strayer',
            'Amber' => 'Adventurer',
            'Arataki Itto' => 'Husk of Opulent Dreams',
            'Arlecchino' => 'Lavawalker',
            'Baizhu' => 'Deepwood Memories',
            'Barbara' => 'Maiden Beloved',
            'Beidou' => 'Thundering Fury',
            'Bennett' => 'Noblesse Oblige',
            'Candace' => 'Tenacity of the Millelith',
            'Charlotte' => 'Golden Troupe ',
            'Chevreuse' => 'Retracing Bolide',
            'Chiori' => 'Vermillion Hereafter',
            'Chongyun' => 'Blizzard Strayer',
            'Clorinde' => 'Thundering Fury',
            'Collei' => 'Gilded Dreams',
            'Cyno' => 'Thundering Fury',
            'Dehya' => 'Lavawalker',
            'Diluc' => 'Crimson Witch of Flames',
            'Diona' => 'Maiden Beloved',
            'Dori' => 'Noblesse Oblige',
            'Emilie' => 'Viridescent Venerer',
            'Eula' => 'Pale Flame',
            'Faruzan' => 'Viridescent Venerer',
            'Fischl' => 'Thundering Fury',
            'Freminet' => 'Blizzard Strayer',
            'Furina' => 'Heart of Depth',
            'Gaming' => 'Retracing Bolide',
            'Ganyu' => 'Wanderer s Troupe',
            'Gorou' => 'Husk of Opulent Dreams',
            'Hu Tao' => 'Crimson Witch of Flames',
            'Jean' => 'Viridescent Venerer',
            'Kachina' => 'Archaic Petra',
            'Kazuha' => 'Viridescent Venerer',
            'Kaeya' => 'Blizzard Strayer',
            'Ayaka' => 'Blizzard Strayer',
            'Ayato' => 'Heart of Depth',
            'Kaveh' => 'Deepwood Memories',
            'Keqing' => 'Thundering Fury',
            'Kinich' => 'Retracing Bolide',
            'Kirara' => 'Deepwood Memories',
            'Klee' => 'Crimson Witch of Flames',
            'Sara' => 'Thundering Fury',
            'Kuki Shinobu' => 'Tenacity of the Millelith',
            'Layla' => 'Blizzard Strayer',
            'Lisa' => 'Thundering Fury',
            'Lynette' => 'Noblesse Oblige',
            'Lyney' => 'Wanderer s Troupe',
            'Mika' => 'Blizzard Strayer',
            'Mona' => 'Heart of Depth',
            'Mualani' => 'Tenacity of the Millelith',
            'Nahida' => 'Deepwood Memories',
            'Navia' => 'Husk of Opulent Dreams',
            'Neuvillette' => 'Heart of Depth',
            'Nilou' => 'Tenacity of the Millelith',
            'Ningguang' => 'Archaic Petra',
            'Noelle' => 'Husk of Opulent Dreams',
            'Qiqi' => 'Maiden Beloved',
            'Raiden' => 'Emblem of Severed Fate',
            'Razor' => 'Pale Flame',
            'Rosaria' => 'Blizzard Strayer',
            'Kokomi' => 'Tenacity of the Millelith',
            'Sayu' => 'Viridescent Venerer',
            'Sethos' => 'Thundering Fury',
            'Shenhe' => 'Blizzard Strayer',
            'Shikanoin Heizou' => 'Viridescent Venerer',
            'Sigewinne' => 'Heart of Depth',
            'Sucrose' => 'Viridescent Venerer',
            'Tartaglia' => 'Heart of Depth',
            'Thoma' => 'Tenacity of the Millelith',
            'Tighnari' => 'Deepwood Memories',
            'Traveler Anemo' => 'Viridescent Venerer',
            'Traveler Dendro' => 'Deepwood Memories',
            'Traveler Electro' => 'Emblem of Severed Fate',
            'Traveler Geo' => 'Archaic Petra',
            'Traveler Hydro' => 'Heart of Depth',
            'Venti' => 'Viridescent Venerer',
            'Wanderer' => 'Desert Pavilion Chronicle',
            'Wriothesley' => 'Heart of Depth',
            'Xiangling' => 'Crimson Witch of Flames',
            'Xianyun' => 'Viridescent Venerer',
            'Xiao' => 'Vermillion Hereafter',
            'Xingqiu' => 'Noblesse Oblige',
            'Xinyan' => 'Retracing Bolide',
            'Yae Miko' => 'Thundering Fury',
            'Yanfei' => 'Lavawalker',
            'Yaoyao' => 'Tenacity of the Millelith',
            'Yelan' => 'Emblem of Severed Fate',
            'Yoimiya' => 'Shimenawa s Reminiscence',
            'Yun Jin' => 'Husk of Opulent Dreams',
            'Zhongli' => 'Archaic Petra',
        ];

        foreach ($characters as $characterName => $artifactName) {
            $characterId = Str::slug($characterName);
            $artifactId = Str::slug($artifactName);

            $characterExists = DB::table('characters')->where('id', $characterId)->exists();
            $artifactExists = DB::table('artifacts')->where('id', $artifactId)->exists();

            if ($characterExists && $artifactExists) {
                DB::table('artifact_character')->insert([
                    'character_id' => $characterId,
                    'artifact_id' => $artifactId,
                ]);
            } else {
                if (!$artifactExists) {
                    echo "Advertencia: El artefacto '{$artifactId}' no existe en la base de datos.\n";
                }
                if (!$characterExists) {
                    echo "Advertencia: El personaje '{$characterId}' no existe en la base de datos.\n";
                }
            }
        }
    }
}