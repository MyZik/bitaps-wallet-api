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

namespace Bitaps\WalletAPI\Tests\Response\CreateWalletAddress;

use Bitaps\WalletAPI\WalletAPI;
use PHPUnit\Framework\TestCase;

class CreateWalletAddressResponseTest extends TestCase
{
    private const ENDPOINT = "https://api.bitaps.com/btc/testnet/v1";
    private const PASSWORD = "1234567890";

    public function testCreateWalletAddressResponse()
    {
        $client       = new WalletAPI(self::ENDPOINT);
        $createWallet = $client->createWallet(null, self::PASSWORD);

        $client = new WalletAPI(self::ENDPOINT, $createWallet->getWalletId(), self::PASSWORD);
        $address  = $client->addAddress();

        self::assertIsString($address->getInvoice());
        self::assertIsString($address->getPaymentCode());
        self::assertIsString($address->getAddress());
        self::assertIsInt($address->getConfirmations());
        self::assertIsString($address->getWalletIdHash());
        self::assertIsString($address->getCurrency());
    }
}
