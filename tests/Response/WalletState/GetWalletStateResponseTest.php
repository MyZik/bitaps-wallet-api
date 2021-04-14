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

namespace Bitaps\WalletAPI\Tests\Response\WalletState;

use Bitaps\WalletAPI\WalletAPI;
use PHPUnit\Framework\TestCase;

class GetWalletStateResponseTest extends TestCase
{
    private const ENDPOINT = "https://api.bitaps.com/btc/testnet/v1";
    private const PASSWORD = "1234567890";

    public function testWalletStateResponse()
    {
        $client       = new WalletAPI(self::ENDPOINT);
        $createWallet = $client->createWallet(null, self::PASSWORD);

        $client = new WalletAPI(self::ENDPOINT, $createWallet->getWalletId(), self::PASSWORD);
        $state  = $client->getWalletState();

        self::assertIsString($state->getCreateDate());
        self::assertIsInt($state->getReceivedAmount());
        self::assertIsInt($state->getSentTx());
        self::assertIsInt($state->getCreateDateTimestamp());
        self::assertIsInt($state->getSuccessCallbacks());
        self::assertIsInt($state->getFailedCallbacks());
        self::assertIsInt($state->getPendingReceivedTx());
        self::assertIsInt($state->getLastUsedNonce());
        self::assertIsString($state->getWalletIdHash());
        self::assertIsInt($state->getSentAmount());
        self::assertIsInt($state->getReceivedTx());
        self::assertIsInt($state->getPendingReceivedAmount());
        self::assertIsInt($state->getPendingSentTx());
        self::assertIsInt($state->getPendingSentAmount());
        self::assertIsInt($state->getInvalidTx());
        self::assertIsInt($state->getBalanceAmount());
        self::assertIsInt($state->getServiceFeePaidAmount());
        self::assertIsInt($state->getAddressCount());
        self::assertIsInt($state->getReceivedAmount());
    }
}
