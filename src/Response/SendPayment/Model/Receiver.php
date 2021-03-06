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

namespace Bitaps\WalletAPI\Response\SendPayment\Model;

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
     * @var int|null
     */
    private ?int $out;

    /**
     * @var int
     */
    private int $amount;

    /**
     * @var string|null
     */
    private ?string $type;

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
     * @return int|null
     */
    public function getOut(): ?int
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

    /**
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }
}
