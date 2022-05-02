<?php

namespace Pinetco\TranslationManager\Commands;

use Illuminate\Console\Command;
use Pinetco\TranslationManager\Models\Translation;

class TranslationManagerCommand extends Command
{
    public $signature = 'translation-manager:import';

    public $description = 'Import translations locally.';

    public function handle(): int
    {
        Translation::notProcessed()
            ->get()
            ->each
            ->process();

        $this->comment('Translations imported successfully.');

        return self::SUCCESS;
    }
}
