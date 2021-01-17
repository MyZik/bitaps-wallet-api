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

namespace Bitaps\WalletAPI\Response\CreateWallet;

use Bitaps\WalletAPI\Response\AbstractResponse;

class CreateWalletResponse extends AbstractResponse
{
    /**
     * Wallet ID
     *
     * @var string
     */
    private string $walletId;

    /**
     * Wallet ID Hash
     *
     * @var string
     */
    private string $walletIdHash;

    /**
     * Currency
     *
     * @var string
     */
    private string $currency;

    /**
     * @return string
     */
    public function getWalletId(): string
    {
        return $this->walletId;
    }

    /**
     * @return string
     */
    public function getWalletIdHash(): string
    {
        return $this->walletIdHash;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }
}
