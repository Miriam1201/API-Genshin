<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\SkillTalent;


class DebugSkillTalents extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'debug:skill-talents';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Debug skill talents and check if character relations are null';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $skills = SkillTalent::with('character')->get();
        foreach ($skills as $skill) {
            if ($skill->character === null) {
                $this->info("Character is null for skill ID: " . $skill->id);
            } else {
                $this->info("Skill ID: " . $skill->id . ", Character Name: " . $skill->character->name);
            }
        }
    }
}
