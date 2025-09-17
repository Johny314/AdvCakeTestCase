<?php

declare(strict_types=1);

namespace App;

class WordReverser
{
    public static function reverseWords(string $text): string
    {
        return preg_replace_callback('/\p{L}+/u', fn ($m) => self::reverseWord($m[0]), $text);
    }

    private static function reverseWord(string $word): string
    {
        $chars = mb_str_split($word, 1, 'UTF-8');
        $reversed = array_reverse($chars);

        $out = '';
        foreach ($chars as $i => $origChar) {
            $revChar = $reversed[$i];
            $out .= self::matchCase($revChar, $origChar);
        }

        return $out;
    }

    private static function matchCase(string $char, string $patternChar): string
    {
        if (mb_strtoupper($patternChar, 'UTF-8') === $patternChar &&
            mb_strtolower($patternChar, 'UTF-8') !== $patternChar) {
            return mb_strtoupper($char, 'UTF-8');
        }
        return mb_strtolower($char, 'UTF-8');
    }
}
