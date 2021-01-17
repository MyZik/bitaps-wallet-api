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

namespace Bitaps\WalletAPI\Model;

class Transaction
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
     * Wallet balance to current transaction
     *
     * @var int|null
     */
    private ?int $timelineBalance;

    /**
     * Count of sent transactions before the current transaction
     *
     * @var int|null
     */
    private ?int $timelineSentCount;

    /**
     * Count of transactions received before the current transaction
     *
     * @var int|null
     */
    private ?int $timelineReceivedCount;

    /**
     * Number of invalid transaction before current transaction
     *
     * @var int|null
     */
    private ?int $timelineInvalidCount;

    /**
     * Creation date of the transaction in the UNIX timestamp format
     *
     * @var int|null
     */
    private ?int $createTimestamp;

    /**
     * Date of confirmation of the transaction in the format UNIX timestamp
     *
     * @var int|null
     */
    private ?int $timestamp;

    /**
     * @var string|null
     */
    private ?string $createTime;

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
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @return string|null
     */
    public function getHash(): ?string
    {
        return $this->hash;
    }

    /**
     * @return int|null
     */
    public function getOut(): ?int
    {
        return $this->out;
    }

    /**
     * @return int|null
     */
    public function getAmount(): ?int
    {
        return $this->amount;
    }

    /**
     * @return string|null
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }

    /**
     * @return int|null
     */
    public function getFee(): ?int
    {
        return $this->fee;
    }

    /**
     * @return int|null
     */
    public function getTimelineBalance(): ?int
    {
        return $this->timelineBalance;
    }

    /**
     * @return int|null
     */
    public function getTimelineSentCount(): ?int
    {
        return $this->timelineSentCount;
    }

    /**
     * @return int|null
     */
    public function getTimelineReceivedCount(): ?int
    {
        return $this->timelineReceivedCount;
    }

    /**
     * @return int|null
     */
    public function getTimelineInvalidCount(): ?int
    {
        return $this->timelineInvalidCount;
    }

    /**
     * @return int|null
     */
    public function getCreateTimestamp(): ?int
    {
        return $this->createTimestamp;
    }

    /**
     * @return int|null
     */
    public function getTimestamp(): ?int
    {
        return $this->timestamp;
    }

    /**
     * @return string|null
     */
    public function getCreateTime(): ?string
    {
        return $this->createTime;
    }

    /**
     * @return string|null
     */
    public function getTime(): ?string
    {
        return $this->time;
    }
}
