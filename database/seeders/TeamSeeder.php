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
        $team = [
            'main_dps' => Character::where('name', 'arataki itto')->first()->id,
            'sub_dps' => Character::where('name', 'albedo')->first()->id,
            'support' => Character::where('name', 'gorou')->first()->id,
            'healer_shielder' => Character::where('name', 'zhongli')->first()->id,
        ];

        DB::table('teams')->insert($team);
    }
}