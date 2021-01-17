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

namespace Bitaps\WalletAPI\Tests\Response\CreateWallet;

use Bitaps\WalletAPI\WalletAPI;
use PHPUnit\Framework\TestCase;

class CreateWalletResponseTest extends TestCase
{
    private const ENDPOINT = "https://api.bitaps.com/btc/testnet/v1";
    private const PASSWORD = "1234567890";

    public function testCreateWalletResponse()
    {
        $client       = new WalletAPI(self::ENDPOINT);
        $createWallet = $client->createWallet(null, self::PASSWORD);

        self::assertIsString($createWallet->getWalletId());
        self::assertIsString($createWallet->getWalletIdHash());
        self::assertIsString($createWallet->getWalletId());
    }
}
