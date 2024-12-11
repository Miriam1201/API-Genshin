<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Artifact;

class ArtifactDuplicateTest extends TestCase
{
    public function test_no_duplicate_artifacts()
    {
        $duplicates = Artifact::select('id')
            ->groupBy('id')
            ->havingRaw('COUNT(*) > 1')
            ->get();

        $this->assertTrue($duplicates->isEmpty(), 'Duplicate artifacts found: ' . $duplicates->toJson());
    }
}