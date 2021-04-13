<?php
/*
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

namespace Bitaps\WalletAPI\Model;

class Receiver
{
    /**
     * @var string
     */
    private string $address;

    /**
     * @var string
     */
    private string $txHash;

    /**
     * @var int
     */
    private int $out;

    /**
     * @var int
     */
    private int $amount;

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @return string
     */
    public function getTxHash(): string
    {
        return $this->txHash;
    }

    /**
     * @return int
     */
    public function getOut(): int
    {
        return $this->out;
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }
}
