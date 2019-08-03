<?php

namespace App\Translations;

interface IVotoxTranslator {

    /**
     * translates the passed $text from $language to VOTOX and returns the results
     *
     * @param string $text
     * @param string $language
     * @return string
     */
    public function translate(string $text, string $language): string;
}