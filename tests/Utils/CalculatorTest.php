<?php

declare(strict_types=1);

/*
 * This file is part of ARK PHP.
 *
 * (c) Brian Faust <hello@brianfaust.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\Tests\Ark\Utils;

use BrianFaust\Tests\Ark\TestCase;
use BrianFaust\Ark\Utils\Calculator;

/**
 * @coversNothing
 */
class CalculatorTest extends TestCase
{
    /**
     * @var int
     */
    private $fixedPoint = 100000000;

    /** @test */
    public function can_calculate_daily_profit_share_with_fee_coverage()
    {
        // Arrange...
        $votingPool = 1000000 * $this->fixedPoint; // 1,000,000 = 100000000000000
        $userPool = 100000 * $this->fixedPoint; // 100,000 = 10000000000000
        $expectedShare = 42.2; // 10%

        // Act...
        $calculator = new Calculator();
        $calculator
            ->withReward(422)
            ->withVotingPool($votingPool)
            ->withProfitShare(100);

        // Assert...
        $this->assertSame($expectedShare, $calculator->perDay($userPool));
    }

    /** @test */
    public function can_calculate_daily_profit_share_without_fee_coverage()
    {
        // Arrange...
        $votingPool = 1000000 * $this->fixedPoint; // 1,000,000 = 100000000000000
        $userPool = 100000 * $this->fixedPoint; // 100,000 = 10000000000000
        $expectedShare = 42.1; // 10%

        // Act...
        $calculator = new Calculator();
        $calculator
            ->withReward(422)
            ->withVotingPool($votingPool)
            ->withProfitShare(100)
            ->coversFee(false);

        // Assert...
        $this->assertSame($expectedShare, $calculator->perDay($userPool));
    }
}
