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

namespace Bitaps\WalletAPI\Model;

class PendingTransaction
{
    /**
     * Block number in the blockchain in which this transaction is included
     *
     * @var int|null
     */
    private ?int $blockHeight;

    /**
     * @var string|null
     */
    private ?string $type;

    /**
     * Transaction hash
     *
     * @var string|null
     */
    private ?string $hash;

    /**
     * Out number
     *
     * @var int|null
     */
    private ?int $out;

    /**
     * Transaction amount
     *
     * @var int|null
     */
    private ?int $amount;

    /**
     * Receiver address
     *
     * @var string|null
     */
    private ?string $address;

    /**
     * Service fee
     *
     * @var int|null
     */
    private ?int $fee;

    /**
     * Date of confirmation of the transaction in the format UNIX timestamp
     *
     * @var int|null
     */
    private ?int $timestamp;

    /**
     * @var string|null
     */
    private ?string $time;

    /**
     * @return int|null
     */
    public function getBlockHeight(): ?int
    {
        return $this->blockHeight;
    }

    /**
     * @param int|null $blockHeight
     */
    public function setBlockHeight(?int $blockHeight): void
    {
        $this->blockHeight = $blockHeight;
    }

    /**
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param string|null $type
     */
    public function setType(?string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return string|null
     */
    public function getHash(): ?string
    {
        return $this->hash;
    }

    /**
     * @param string|null $hash
     */
    public function setHash(?string $hash): void
    {
        $this->hash = $hash;
    }

    /**
     * @return int|null
     */
    public function getOut(): ?int
    {
        return $this->out;
    }

    /**
     * @param int|null $out
     */
    public function setOut(?int $out): void
    {
        $this->out = $out;
    }

    /**
     * @return int|null
     */
    public function getAmount(): ?int
    {
        return $this->amount;
    }

    /**
     * @param int|null $amount
     */
    public function setAmount(?int $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @return string|null
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }

    /**
     * @param string|null $address
     */
    public function setAddress(?string $address): void
    {
        $this->address = $address;
    }

    /**
     * @return int|null
     */
    public function getFee(): ?int
    {
        return $this->fee;
    }

    /**
     * @param int|null $fee
     */
    public function setFee(?int $fee): void
    {
        $this->fee = $fee;
    }

    /**
     * @return int|null
     */
    public function getTimestamp(): ?int
    {
        return $this->timestamp;
    }

    /**
     * @param int|null $timestamp
     */
    public function setTimestamp(?int $timestamp): void
    {
        $this->timestamp = $timestamp;
    }

    /**
     * @return string|null
     */
    public function getTime(): ?string
    {
        return $this->time;
    }

    /**
     * @param string|null $time
     */
    public function setTime(?string $time): void
    {
        $this->time = $time;
    }
}
