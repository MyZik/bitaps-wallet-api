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

namespace Bitaps\WalletAPI\Tests\Response\Addresses;

use Bitaps\WalletAPI\WalletAPI;
use PHPUnit\Framework\TestCase;

class AddressesResponseTest extends TestCase
{
    private const ENDPOINT = "https://api.bitaps.com/btc/testnet/v1";
    private const WALLET_ID = "BTCw44Uo74tfgkrQFW5h49qC6f4oF2iG5N6Lk4JRMSUZ9dfLfU9AD"; // BTC testnet wallet ID
    private const WALLET_PASSWORD = "124525"; // BTC testnet wallet password;

    public function testGetAddressesResponse()
    {
        $client = new WalletAPI(self::ENDPOINT, self::WALLET_ID, self::WALLET_PASSWORD);

        $addresses = $client->getAddresses(null, null, 10);

        self::assertIsArray($addresses->getTxList());
        self::assertIsBool($addresses->isNextPage());

        foreach ($addresses->getTxList() as $address) {
            self::assertIsString($address->getAddress());
            self::assertIsInt($address->getReceivedAmount());
            self::assertIsInt($address->getReceivedTx());
            self::assertIsInt($address->getPendingReceivedAmount());
            self::assertIsInt($address->getPendingReceivedTx());
            self::assertIsInt($address->getTimestamp());
            self::assertIsString($address->getTime());
        }
    }
}
