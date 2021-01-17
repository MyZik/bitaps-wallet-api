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

namespace Bitaps\WalletAPI\Tests\Response\WalletDailyStatistics;

use Bitaps\WalletAPI\Response\WalletDailyStatistics\Model\DailyStatistics;
use Bitaps\WalletAPI\WalletAPI;
use PHPUnit\Framework\TestCase;

class WalletDailyStatisticsResponseTest extends TestCase
{
    private const ENDPOINT = "https://api.bitaps.com/btc/testnet/v1";
    private const PASSWORD = "1234567890";

    public function testWalletDailyStatisticsResponse()
    {
        $client       = new WalletAPI(self::ENDPOINT);
        $createWallet = $client->createWallet(null, self::PASSWORD);

        $client = new WalletAPI(self::ENDPOINT, $createWallet->getWalletId(), self::PASSWORD);
        $address = $client->addAddress();
        $dailyStatistics  = $client->getDailyStatistics();

        self::assertIsArray($dailyStatistics->getDayList());
        self::assertIsBool($dailyStatistics->isNextPage());

        /** @var DailyStatistics $stat */
        foreach ($dailyStatistics->getDayList() as $stat) {
            self::assertIsInt($stat->getAddressCount());
            self::assertIsInt($stat->getPendingReceivedAmount());
            self::assertIsInt($stat->getPendingSentAmount());
            self::assertIsInt($stat->getReceivedAmount());
            self::assertIsInt($stat->getSentAmount());
            self::assertIsInt($stat->getServiceFeePaidAmount());
            self::assertIsInt($stat->getSentTx());
            self::assertIsInt($stat->getReceivedTx());
            self::assertIsInt($stat->getPendingReceivedTx());
            self::assertIsInt($stat->getInvalidTx());
            self::assertIsInt($stat->getBalanceAmount());
            self::assertIsInt($stat->getPendingReceivedAmountTotal());
            self::assertIsInt($stat->getPendingSentAmountTotal());
            self::assertIsInt($stat->getPendingSentTxTotal());
            self::assertIsInt($stat->getPendingReceivedTxTotal());
        }
    }
}
