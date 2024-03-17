<?php

namespace App\Services;

use App\Repositories\LanguageRepository;

class LanguageService
{
    protected $language_repo;

    /**
     * Construct a new LanguageService instance.
     *
     * @param  \App\Repositories\LanguageRepository  $language_repo
     * @return void
     */
    public function __construct(LanguageRepository $language_repo)
    {
        $this->language_repo = $language_repo;
    }

    /**
     * Get all languages.
     *
     * @return \Illuminate\Database\Eloquent\Collection The collection of languages
     */
    public function getAll()
    {
        return $this->language_repo->getAll();
    }

    /**
     * Get only language names.
     *
     * @return \Illuminate\Support\Collection The collection of language names
     */
    public function getOnlyNames()
    {
        return $this->language_repo->getOnlyNames();
    }
}
