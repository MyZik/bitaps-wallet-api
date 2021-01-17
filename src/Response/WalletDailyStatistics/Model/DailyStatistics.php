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

namespace Bitaps\WalletAPI\Response\WalletDailyStatistics\Model;

class DailyStatistics
{
    /**
     * Wallet address count
     *
     * @var int|null
     */
    private ?int $addressCount;

    /**
     * Unconfirmed amount received per day at the end of the day
     *
     * @var int|null
     */
    private ?int $pendingReceivedAmount;

    /**
     * Unconfirmed amount sent per day at the end of the day
     *
     * @var int|null
     */
    private ?int $pendingSentAmount;

    /**
     * Amount received per day
     *
     * @var int|null
     */
    private ?int $receivedAmount;

    /**
     * Amount sent per day
     *
     * @var int|null
     */
    private ?int $sentAmount;

    /**
     * Service fee paid
     *
     * @var int|null
     */
    private ?int $serviceFeePaidAmount;

    /**
     * Count of daily debit transactions
     *
     * @var int|null
     */
    private ?int $sentTx;

    /**
     * Count of recharge transactions per day
     *
     * @var int|null
     */
    private int $receivedTx;

    /**
     * Count of uncommitted transactions sent per day at the end of the day
     *
     * @var int|null
     */
    private ?int $pendingSentTx;

    /**
     * Count of unconfirmed recharge transactions per day at the end of the day
     *
     * @var int|null
     */
    private ?int $pendingReceivedTx;

    /**
     * Count of invalid transactions at the end of the day
     *
     * @var int|null
     */
    private ?int $invalidTx;

    /**
     * Balance at the end of the day
     *
     * @var int|null
     */
    private ?int $balanceAmount;

    /**
     * Unconfirmed amount including previous days at the end of the day
     *
     * @var int|null
     */
    private ?int $pendingReceivedAmountTotal;

    /**
     * Unconfirmed amount including previous days at the end of the day
     *
     * @var int|null
     */
    private ?int $pendingSentAmountTotal;

    /**
     * Count of unconfirmed balance sent transactions including previous days at the end of the day
     *
     * @var int|null
     */
    private ?int $pendingSentTxTotal;

    /**
     * Count of unconfirmed recharge transactions including previous days at the end of the day
     *
     * @var int|null
     */
    private ?int $pendingReceivedTxTotal;

    /**
     * Date
     *
     * @var string|null
     */
    private ?string $date;

    /**
     * Date in format UNIX timestamp / 86400
     *
     * @var int|null
     */
    private ?int $datestamp;

    /**
     * @return int|null
     */
    public function getAddressCount(): ?int
    {
        return $this->addressCount;
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
    public function getPendingSentAmount(): ?int
    {
        return $this->pendingSentAmount;
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
    public function getSentAmount(): ?int
    {
        return $this->sentAmount;
    }

    /**
     * @return int|null
     */
    public function getServiceFeePaidAmount(): ?int
    {
        return $this->serviceFeePaidAmount;
    }

    /**
     * @return int|null
     */
    public function getSentTx(): ?int
    {
        return $this->sentTx;
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
    public function getPendingSentTx(): ?int
    {
        return $this->pendingSentTx;
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
    public function getInvalidTx(): ?int
    {
        return $this->invalidTx;
    }

    /**
     * @return int|null
     */
    public function getBalanceAmount(): ?int
    {
        return $this->balanceAmount;
    }

    /**
     * @return int|null
     */
    public function getPendingReceivedAmountTotal(): ?int
    {
        return $this->pendingReceivedAmountTotal;
    }

    /**
     * @return int|null
     */
    public function getPendingSentAmountTotal(): ?int
    {
        return $this->pendingSentAmountTotal;
    }

    /**
     * @return int|null
     */
    public function getPendingSentTxTotal(): ?int
    {
        return $this->pendingSentTxTotal;
    }

    /**
     * @return int|null
     */
    public function getPendingReceivedTxTotal(): ?int
    {
        return $this->pendingReceivedTxTotal;
    }

    /**
     * @return string|null
     */
    public function getDate(): ?string
    {
        return $this->date;
    }

    /**
     * @return int|null
     */
    public function getDatestamp(): ?int
    {
        return $this->datestamp;
    }
}
