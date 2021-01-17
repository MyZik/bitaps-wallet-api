<?php

declare(strict_types=1);

/*
 * Package: PHP Bitaps API
 *
 * (c) Eldar Gazaliev <eldarqa@gmx.de>
 *
 *  Link: <https://github.com/MyZik>
 *
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace Bitaps\WalletAPI\Response\WalletDailyStatistics;

use Bitaps\WalletAPI\Response\AbstractResponse;
use JMS\Serializer\Annotation as Serializer;

class WalletDailyStatisticsResponse extends AbstractResponse
{
    /**
     * @Serializer\SerializedName("day_list")
     * @Serializer\Type("array<Bitaps\WalletAPI\Response\WalletDailyStatistics\Model\DailyStatistics>")
     *
     */
    private array $dayList;

    /**
     * @Serializer\SerializedName("next_page")
     * @Serializer\Type("bool")
     *
     * @var bool
     */
    private bool $nextPage;

    /**
     * @return array
     */
    public function getDayList(): array
    {
        return $this->dayList;
    }

    /**
     * @return bool
     */
    public function isNextPage(): bool
    {
        return $this->nextPage;
    }
}
