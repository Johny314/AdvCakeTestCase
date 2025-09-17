<?php

declare(strict_types=1);

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\WordReverser;

final class WordReverserTest extends TestCase
{
    public function testSimpleWords(): void
    {
        $this->assertSame('Tac', WordReverser::reverseWords('Cat'));
        $this->assertSame('Ьшым', WordReverser::reverseWords('Мышь'));
        $this->assertSame('esuOh', WordReverser::reverseWords('houSe'));
        $this->assertSame('кимОД', WordReverser::reverseWords('домИК'));
        $this->assertSame('tnAhPele', WordReverser::reverseWords('elEpHant'));
    }

    public function testPunctuationPreserved(): void
    {
        $this->assertSame('tac,', WordReverser::reverseWords('cat,'));
        $this->assertSame('Амиз:', WordReverser::reverseWords('Зима:'));
        $this->assertSame("si 'dloc' won", WordReverser::reverseWords("is 'cold' now"));
        $this->assertSame('отэ «Кат» "отсорп"', WordReverser::reverseWords('это «Так» "просто"'));
    }

    public function testHyphenAndApostropheSeparators(): void
    {
        $this->assertSame('driht-trap', WordReverser::reverseWords('third-part'));
        $this->assertSame("nac`t", WordReverser::reverseWords("can`t"));
        $this->assertSame("a'lop", WordReverser::reverseWords("a'pol"));
    }

    public function testMixedLanguagesAndEdgeCases(): void
    {
        $this->assertSame('Tset тсет', WordReverser::reverseWords('Test тест'));
        $this->assertSame('A b C', WordReverser::reverseWords('A b C'));
        $this->assertSame('', WordReverser::reverseWords(''));
        $this->assertSame('á', WordReverser::reverseWords('á'));

        $this->assertSame('A', WordReverser::reverseWords('A'));
        $this->assertSame('Я', WordReverser::reverseWords('Я'));
        $this->assertSame('Cd21Ab', WordReverser::reverseWords('Dc21Ba'));
        $this->assertSame('eNoHpI', WordReverser::reverseWords('iPhOnE'));
    }
}
