<?php

namespace Pinetco\TranslationManager;

use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Pinetco\TranslationManager\Models\Translation;

class Translator
{
    protected Translation $translation;

    protected string $langFilePath;

    public function __construct(Translation $translation)
    {
        $this->translation = $translation;
        $this->langFilePath = $this->getLangFilePath();
    }

    public function process()
    {
        $translation = $this->translation;

        $translations = $this->loadTranslationsFromLangFile();

        $originalKey = $translations->search($translation->from);

        if (!$originalKey) {
            $translation->processed();

            return;
        }

        $translationKey = $translation->shouldAddNewKey()
            ? $translation->key
            : $originalKey;

        $translations->put($translationKey, $translation->to);

        if ($translation->shouldAddNewKey()) {
            $this->replaceTranslationKeyInViews($originalKey);
        }

        $this->writeTranslationsToLangFile($translations);

        $translation->processed();
    }

    protected function getLangFilePath(): string
    {
        $path = resource_path("lang/{$this->translation->locale}.json");

        if (!File::exists($path)) {
            throw new Exception('Language file not found');
        }

        return $path;
    }

    protected function loadTranslationsFromLangFile(): Collection
    {
        return collect(
            json_decode(File::get($this->langFilePath), true)
        );
    }

    protected function writeTranslationsToLangFile(Collection $translations): void
    {
        File::put($this->langFilePath, $translations->toJson());
    }

    protected function replaceTranslationKeyInViews($originalKey)
    {
        foreach ($this->translation->views as $view) {
            $content = File::get($view->path);

            $fromKey = $originalKey;
            $toKey = $this->translation->key;

            $replacements = [
                "__('$fromKey')" => "__('$toKey')",
                "trans('$fromKey')" => "trans('$toKey')",
                "@lang('$fromKey')" => "@lang('$toKey')",
            ];

            $newContent = str_replace(
                array_keys($replacements), array_values($replacements), $content
            );

            File::put($view->path, $newContent);
        }
    }
}
