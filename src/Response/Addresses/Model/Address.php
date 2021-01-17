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

namespace Bitaps\WalletAPI\Response\Addresses\Model;

class Address
{
    /**
     * Address
     *
     * @var string
     */
    private string $address;

    /**
     * Amount received by the address
     *
     * @var int|null
     */
    private ?int $receivedAmount;

    /**
     * Count of incoming transactions received by the address
     *
     * @var int|null
     */
    private ?int $receivedTx;

    /**
     * Pending amount received by the address
     *
     * @var int|null
     */
    private ?int $pendingReceivedAmount;

    /**
     * Count of incoming unconfirmed transactions received by the address
     *
     * @var int|null
     */
    private ?int $pendingReceivedTx;

    /**
     * Date of creation of the address in the format UNIX timestamp
     *
     * @var int|null
     */
    private ?int $timestamp;

    /**
     * Date of creation of the address in the format ISO UTC 0
     *
     * @var string
     */
    private string $time;

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @return int|null
     */
    public function getReceivedAmount(): ?int
    {
        return $this->receivedAmount;
    }

    /**
     * @return int|null
     */
    public function getReceivedTx(): ?int
    {
        return $this->receivedTx;
    }

    /**
     * @return int|null
     */
    public function getPendingReceivedAmount(): ?int
    {
        return $this->pendingReceivedAmount;
    }

    /**
     * @return int|null
     */
    public function getPendingReceivedTx(): ?int
    {
        return $this->pendingReceivedTx;
    }

    /**
     * @return int|null
     */
    public function getTimestamp(): ?int
    {
        return $this->timestamp;
    }

    /**
     * @return string
     */
    public function getTime(): string
    {
        return $this->time;
    }
}
