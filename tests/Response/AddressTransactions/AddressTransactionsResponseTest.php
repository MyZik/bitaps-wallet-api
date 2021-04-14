<?php

/**
 * Package: PHP Bitaps API
 *
 * (c) Eldar Gazaliev <eldarqa@gmx.de>
 *
 * Link: <https://github.com/MyZik>
 *
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

declare(strict_types=1);

namespace Bitaps\WalletAPI\Tests\Response\AddressTransactions;

use Bitaps\WalletAPI\Response\AddressTransactions\Transactions;
use Bitaps\WalletAPI\WalletAPI;
use PHPUnit\Framework\TestCase;

class AddressTransactionsResponseTest extends TestCase
{
    private const ENDPOINT = "https://api.bitaps.com/btc/testnet/v1";
    private const WALLET_ID = "BTCw44Uo74tfgkrQFW5h49qC6f4oF2iG5N6Lk4JRMSUZ9dfLfU9AD"; // BTC testnet wallet ID
    private const WALLET_PASSWORD = "124525"; // BTC testnet wallet password;
    private const ADDRESS = "2MujPMWFSDCn94qZZi5ipa6Pcyhb82Cym5U";

    public function testAddressTransactionsResponse()
    {
        $client   = new WalletAPI(self::ENDPOINT, self::WALLET_ID, self::WALLET_PASSWORD);

        $addressTransactions = $client->getAddressTransactions(self::ADDRESS, null, null, 5);

        self::assertIsObject($addressTransactions->getTransactions());
        self::assertIsObject($addressTransactions->getPendingTransactions());

        self::assertIsArray($addressTransactions->getTransactions()->getTxList());
        self::assertIsBool($addressTransactions->getTransactions()->isNextPage());

        self::assertIsArray($addressTransactions->getPendingTransactions()->getTxList());
        self::assertIsBool($addressTransactions->getPendingTransactions()->isNextPage());

        /** @var Transactions $transactions */
        foreach ($addressTransactions->getTransactions()->getTxList() as $transaction) {
            self::assertIsInt($transaction->getBlockHeight());
            self::assertIsString($transaction->getType());
            self::assertIsString($transaction->getHash());
            self::assertIsInt($transaction->getOut());
            self::assertIsInt($transaction->getAmount());
            self::assertIsString($transaction->getAddress());
            self::assertIsInt($transaction->getFee());
            self::assertIsInt($transaction->getTimelineBalance());
            self::assertIsInt($transaction->getTimelineSentCount());
            self::assertIsInt($transaction->getTimelineReceivedCount());
            self::assertIsInt($transaction->getTimelineInvalidCount());
            self::assertIsInt($transaction->getCreateTimestamp());
            self::assertIsString($transaction->getCreateTime());
            self::assertIsString($transaction->getTime());
        }
    }
}
