<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Character;

class CharacterDuplicateTest extends TestCase
{
    public function test_no_duplicate_characters()
    {
        $duplicates = Character::select('id')
            ->groupBy('id')
            ->havingRaw('COUNT(*) > 1')
            ->get();

        $this->assertTrue($duplicates->isEmpty(), 'Duplicate characters found: ' . $duplicates->toJson());
    }
}