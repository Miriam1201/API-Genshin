<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Team;

class TeamDuplicateTest extends TestCase
{
    public function test_no_duplicate_teams()
    {
        $duplicates = Team::select(['main_dps', 'sub_dps', 'support', 'healer_shielder'])
            ->groupBy(['main_dps', 'sub_dps', 'support', 'healer_shielder'])
            ->havingRaw('COUNT(*) > 1')
            ->get();

        $this->assertTrue($duplicates->isEmpty(), 'Duplicate teams found: ' . $duplicates->toJson());
    }
}