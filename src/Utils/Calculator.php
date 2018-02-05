<?php

declare(strict_types=1);

/*
 * This file is part of Ark PHP Client.
 *
 * (c) Brian Faust <hello@brianfaust.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\Ark\Utils;

use BrianFaust\Ark\Exceptions\VoteWeightExceeded;
use BrianFaust\Ark\Exceptions\ProfitShareExceeded;

class Calculator
{
    /**
     * @var int
     */
    private $fee = 10000000;

    /**
     * @var int
     */
    private $fixedPoint = 100000000;

    /**
     * @var float
     */
    private $reward = 422;

    /**
     * @var float
     */
    private $profitShare;

    /**
     * @var float
     */
    private $votingPool;

    /**
     * @var float
     */
    private $excludedVotes = 0;

    /**
     * @var bool
     */
    private $coversFee = true;

    /**
     * Calculate the ARK profit share per second.
     *
     * @param int $value
     *
     * @return float
     */
    public function perSecond(int $value): float
    {
        return $this->perMinute($value) / 60;
    }

    /**
     * Calculate the ARK profit share per minute.
     *
     * @param int $value
     *
     * @return float
     */
    public function perMinute(int $value): float
    {
        return $this->perHour($value) / 60;
    }

    /**
     * Calculate the ARK profit share per hour.
     *
     * @param int $value
     *
     * @return float
     */
    public function perHour(int $value): float
    {
        return $this->perDay($value) / 24;
    }

    /**
     * Calculate the ARK profit share per day.
     *
     * @param int $value
     *
     * @return float
     */
    public function perDay(int $value): float
    {
        $profitShare = $this->profitShare;

        if ($profitShare > 1) {
            $profitShare = $profitShare / 100;
        }

        if ($profitShare > 1) {
            throw new ProfitShareExceeded('Profit Share cannot exceed 100%');
        }

        $result = $this->reward * $profitShare * $this->voteWeight($value);

        if (! $this->coversFee) {
            return $result - ($this->fee / $this->fixedPoint);
        }

        return $result;
    }

    /**
     * Calculate the ARK profit share per week.
     *
     * @param int $value
     *
     * @return float
     */
    public function perWeek(int $value): float
    {
        return $this->perDay($value) * 7;
    }

    /**
     * Calculate the ARK profit share per month.
     *
     * @param int $value
     *
     * @return float
     */
    public function perMonth(int $value): float
    {
        return $this->perWeek($value) * 4;
    }

    /**
     * Calculate the ARK profit share per year.
     *
     * @param int $value
     *
     * @return float
     */
    public function perYear(int $value): float
    {
        return $this->perMonth($value) * 12;
    }

    /**
     * @param int $value
     *
     * @return \BrianFaust\Ark\Utils\Calculator
     */
    public function withReward(int $value): self
    {
        $this->reward = $value;

        return $this;
    }

    /**
     * @param int $value
     *
     * @return \BrianFaust\Ark\Utils\Calculator
     */
    public function withVotingPool(int $value): self
    {
        $this->votingPool = $value;

        return $this;
    }

    /**
     * @param int|float $value
     *
     * @return \BrianFaust\Ark\Utils\Calculator
     */
    public function withProfitShare($value): self
    {
        $this->profitShare = $value;

        return $this;
    }

    /**
     * @param int $value
     *
     * @return \BrianFaust\Ark\Utils\Calculator
     */
    public function withExcludedVotes(int $value): self
    {
        $this->excludedVotes = $value;

        return $this;
    }

    /**
     * @param bool $value
     *
     * @return \BrianFaust\Ark\Utils\Calculator
     */
    public function coversFee(bool $value): self
    {
        $this->coversFee = $value;

        return $this;
    }

    /**
     * Calculate the vote weight for the given value.
     *
     * @param int $value
     *
     * @return float
     */
    public function voteWeight(int $value): float
    {
        $weight = $value / ($this->votingPool - $this->excludedVotes);

        if ($weight > 1) {
            throw new VoteWeightExceeded('Vote Weight cannot exceed 100%.');
        }

        return $weight;
    }
}
