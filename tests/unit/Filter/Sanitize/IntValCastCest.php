<?php
declare(strict_types=1);

/**
 * This file is part of the Phalcon Framework.
 *
 * (c) Phalcon Team <team@phalconphp.com>
 *
 * For the full copyright and license information, please view the LICENSE.txt
 * file that was distributed with this source code.
 */

namespace Phalcon\Test\Unit\Filter\Sanitize;

use Codeception\Example;
use Phalcon\Filter\Sanitize\IntValCast;
use Phalcon\Filter\Sanitize\Email;
use UnitTester;

/**
 * Class IntValCastCest
 */
class IntValCastCest
{
    /**
     * Tests Phalcon\Filter\Sanitize\Email :: __invoke()
     *
     * @dataProvider getData
     *
     * @param UnitTester $I
     * @param Example    $example
     *
     * @author Phalcon Team <team@phalconphp.com>
     * @since  2018-11-13
     */
    public function filterSanitizeEmailInvoke(UnitTester $I, Example $example)
    {
        $I->wantToTest('Filter\Sanitize\IntValCast - __invoke()');

        $sanitizer = new IntValCast();

        $actual   = $sanitizer($example[0]);
        $I->assertEquals($example[1], $actual);
    }

    /**
     * @return array
     */
    private function getData(): array
    {
        return [
            [1000, 1000],
            [0xFFA, 0xFFA],
            ['1000', 1000],
            ['lol', 0],
            ['!100a019.01a', 0],
        ];
    }
}
