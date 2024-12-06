<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Team;
use App\Models\Character;
use Illuminate\Support\Facades\DB;


class TeamSeeder extends Seeder
{
    public function run()
    {
        $teamsData = [
            [
                'main_dps' => 'arataki-itto',
                'sub_dps' => 'albedo',
                'support' => 'gorou',
                'healer_shielder' => 'zhongli',
            ],
            [
                'main_dps' => 'alhaitham',
                'sub_dps' => 'yae-miko',
                'support' => 'nahida',
                'healer_shielder' => 'kuki-shinobu',
            ],
            [
                'main_dps' => 'aloy',
                'sub_dps' => 'xiangling',
                'support' => 'kazuha',
                'healer_shielder' => 'diona',
            ],
            [
                'main_dps' => 'amber',
                'sub_dps' => 'rosaria',
                'support' => 'kazuha',
                'healer_shielder' => 'bennett',
            ],
            [
                'main_dps' => 'arlecchino',
                'sub_dps' => 'furina',
                'support' => 'kazuha',
                'healer_shielder' => 'bennett',
            ],
            [
                'main_dps' => 'ayaka',
                'sub_dps' => 'kazuha',
                'support' => 'shenhe',
                'healer_shielder' => 'mona',
            ],
            [
                'main_dps' => 'ayato',
                'sub_dps' => 'fischl',
                'support' => 'beidou',
                'healer_shielder' => 'jean',
            ],
            [
                'main_dps' => 'cyno',
                'sub_dps' => 'yelan',
                'support' => 'nahida',
                'healer_shielder' => 'baizhu',
            ],
            [
                'main_dps' => 'sucrose',
                'sub_dps' => 'fischl',
                'support' => 'beidou',
                'healer_shielder' => 'xingqiu',
            ],
            [
                'main_dps' => 'arlecchino',
                'sub_dps' => 'candace',
                'support' => 'kazuha',
                'healer_shielder' => 'bennett',
            ],
            [
                'main_dps' => 'neuvillette',
                'sub_dps' => 'furina',
                'support' => 'kazuha',
                'healer_shielder' => 'charlotte',
            ],
            [
                'main_dps' => 'yae-miko',
                'sub_dps' => 'xiangling',
                'support' => 'fischl',
                'healer_shielder' => 'chevreuse',
            ],
            [
                'main_dps' => 'navia',
                'sub_dps' => 'chiori',
                'support' => 'furina',
                'healer_shielder' => 'bennett',
            ],
            [
                'main_dps' => 'chongyun',
                'sub_dps' => 'xiangling',
                'support' => 'xingqiu',
                'healer_shielder' => 'bennett',
            ],
            [
                'main_dps' => 'clorinde',
                'sub_dps' => 'nahida',
                'support' => 'furina',
                'healer_shielder' => 'baizhu',
            ],
            [
                'main_dps' => 'nilou',
                'sub_dps' => 'collei',
                'support' => 'nahida',
                'healer_shielder' => 'kokomi',
            ],
            [
                'main_dps' => 'mualani',
                'sub_dps' => 'dehya',
                'support' => 'emilie',
                'healer_shielder' => 'furina',
            ],
            [
                'main_dps' => 'diluc',
                'sub_dps' => 'xianyun',
                'support' => 'furina',
                'healer_shielder' => 'bennett',
            ],
            [
                'main_dps' => 'ayaka',
                'sub_dps' => 'kazuha',
                'support' => 'mona',
                'healer_shielder' => 'diona',
            ],
            [
                'main_dps' => 'alhaitham',
                'sub_dps' => 'nahida',
                'support' => 'xingqiu',
                'healer_shielder' => 'dori',
            ],
            [
                'main_dps' => 'eula',
                'sub_dps' => 'raiden',
                'support' => 'mika',
                'healer_shielder' => 'furina',
            ],
            [
                'main_dps' => 'xiao',
                'sub_dps' => 'xianyun',
                'support' => 'faruzan',
                'healer_shielder' => 'furina',
            ],
            [
                'main_dps' => 'xiao',
                'sub_dps' => 'xianyun',
                'support' => 'faruzan',
                'healer_shielder' => 'furina',
            ],
            [
                'main_dps' => 'freminet',
                'sub_dps' => 'yelan',
                'support' => 'fischl',
                'healer_shielder' => 'mika',
            ],
            [
                'main_dps' => 'gaming',
                'sub_dps' => 'furina',
                'support' => 'xianyun',
                'healer_shielder' => 'bennett',
            ],
            [
                'main_dps' => 'ganyu',
                'sub_dps' => 'rosaria',
                'support' => 'venti',
                'healer_shielder' => 'mona',
            ],
            [
                'main_dps' => 'hu-tao',
                'sub_dps' => 'xingqiu',
                'support' => 'yelan',
                'healer_shielder' => 'zhongli',
            ],
            [
                'main_dps' => 'xiao',
                'sub_dps' => 'faruzan',
                'support' => 'furina',
                'healer_shielder' => 'jean',
            ],
            [
                'main_dps' => 'mualani',
                'sub_dps' => 'kachina',
                'support' => 'xiangling',
                'healer_shielder' => 'furina',
            ],
            [
                'main_dps' => 'kaeya',
                'sub_dps' => 'chongyun',
                'support' => 'yelan',
                'healer_shielder' => 'lynette',
            ],
            [
                'main_dps' => 'nilou',
                'sub_dps' => 'kaveh',
                'support' => 'nahida',
                'healer_shielder' => 'xingqiu',
            ],
            [
                'main_dps' => 'keqing',
                'sub_dps' => 'sara',
                'support' => 'kazuha',
                'healer_shielder' => 'bennett',
            ],
            [
                'main_dps' => 'kinich',
                'sub_dps' => 'xiangling',
                'support' => 'emilie',
                'healer_shielder' => 'bennett',
            ],
            [
                'main_dps' => 'nahida',
                'sub_dps' => 'kuki-shinobu',
                'support' => 'barbara',
                'healer_shielder' => 'zhongli',
            ],
            [
                'main_dps' => 'nilou',
                'sub_dps' => 'nahida',
                'support' => 'kirara',
                'healer_shielder' => 'kokomi',
            ],
            [
                'main_dps' => 'klee',
                'sub_dps' => 'xiangling',
                'support' => 'kazuha',
                'healer_shielder' => 'bennett',
            ],
            [
                'main_dps' => 'ganyu',
                'sub_dps' => 'venti',
                'support' => 'mona',
                'healer_shielder' => 'layla',
            ],
            [
                'main_dps' => 'eula',
                'sub_dps' => 'lisa',
                'support' => 'mika',
                'healer_shielder' => 'furina',
            ],
            [
                'main_dps' => 'lyney',
                'sub_dps' => 'xiangling',
                'support' => 'kazuha',
                'healer_shielder' => 'bennett',
            ],
            [
                'main_dps' => 'neuvillette',
                'sub_dps' => 'beidou',
                'support' => 'kazuha',
                'healer_shielder' => 'furina',
            ],
            [
                'main_dps' => 'ningguang',
                'sub_dps' => 'furina',
                'support' => 'bennett',
                'healer_shielder' => 'zhongli',
            ],
            [
                'main_dps' => 'noelle',
                'sub_dps' => 'yun-jin',
                'support' => 'gorou',
                'healer_shielder' => 'yelan',
            ],
            [
                'main_dps' => 'razor',
                'sub_dps' => 'fischl',
                'support' => 'qiqi',
                'healer_shielder' => 'zhongli',
            ],
            [
                'main_dps' => 'raiden',
                'sub_dps' => 'sara',
                'support' => 'chevreuse',
                'healer_shielder' => 'bennett',
            ],
            [
                'main_dps' => 'neuvillette',
                'sub_dps' => 'furina',
                'support' => 'beidou',
                'healer_shielder' => 'sayu',
            ],
            [
                'main_dps' => 'neuvillette',
                'sub_dps' => 'furina',
                'support' => 'beidou',
                'healer_shielder' => 'sayu',
            ],
            [
                'main_dps' => 'sethos',
                'sub_dps' => 'yelan',
                'support' => 'nahida',
                'healer_shielder' => 'baizhu',
            ],
            [
                'main_dps' => 'shikanoin-heizou',
                'sub_dps' => 'faruzan',
                'support' => 'furina',
                'healer_shielder' => 'bennett',
            ],
            [
                'main_dps' => 'nahida',
                'sub_dps' => 'raiden',
                'support' => 'furina',
                'healer_shielder' => 'sigewinne',
            ],
            [
                'main_dps' => 'tartaglia',
                'sub_dps' => 'xiangling',
                'support' => 'sucrose',
                'healer_shielder' => 'bennett',
            ],
            [
                'main_dps' => 'nahida',
                'sub_dps' => 'xianyun',
                'support' => 'thoma',
                'healer_shielder' => 'kuki-shinobu',
            ],
            [
                'main_dps' => 'tighnari',
                'sub_dps' => 'nahida',
                'support' => 'furina',
                'healer_shielder' => 'kuki-shinobu',
            ],
            [
                'main_dps' => 'wanderer',
                'sub_dps' => 'faruzan',
                'support' => 'bennett',
                'healer_shielder' => 'thoma',
            ],
            [
                'main_dps' => 'wriothesley',
                'sub_dps' => 'ganyu',
                'support' => 'kazuha',
                'healer_shielder' => 'kokomi',
            ],
            [
                'main_dps' => 'xinyan',
                'sub_dps' => 'raiden',
                'support' => 'mika',
                'healer_shielder' => 'bennett',
            ],
            [
                'main_dps' => 'yanfei',
                'sub_dps' => 'xingqiu',
                'support' => 'kazuha',
                'healer_shielder' => 'zhongli',
            ],
            [
                'main_dps' => 'nilou',
                'sub_dps' => 'nahida',
                'support' => 'xingqiu',
                'healer_shielder' => 'yaoyao',
            ],
            [
                'main_dps' => 'yoimiya',
                'sub_dps' => 'yelan',
                'support' => 'kazuha',
                'healer_shielder' => 'bennett',
            ],
        ];

        foreach ($teamsData as $teamData) {
            $team = [
                'main_dps' => $teamData['main_dps'],
                'sub_dps' => $teamData['sub_dps'],
                'support' => $teamData['support'],
                'healer_shielder' => $teamData['healer_shielder'],
            ];

            DB::table('teams')->insert($team);
        }
    }
}