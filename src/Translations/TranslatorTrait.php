<?php

namespace App\Translations;

/**
 * reusable functions for all implementations of IVotoxTranslator
 */
trait TranslatorTrait {

    /**
     * removes punctuation from the passed $text after replacing dashes with whitespaces
     * @param string $text
     * @return string
     */
    public function sanitize(string $text): string {
        return mb_strtoupper(
            preg_replace(
                '/[^a-zA-ZüÜäÄöÖ0-9\s\n\r\t]/',
                '',
                str_replace('-', ' ', $text)
            )
        );
    }

    /**
     * takes an associative array mapping search => replace, replaces all instances and returns the result
     *
     * @param array $map
     * @param string $subject
     * @return string
     */
    public function replace(array $map, string $subject): string {
        return str_replace(
            array_keys($map),
            array_values($map),
            $subject
        );
    }
}