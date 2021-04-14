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

namespace Bitaps\WalletAPI\Response\Wallet;

use Bitaps\WalletAPI\Response\AbstractResponse;

class StateResponse extends AbstractResponse
{
    /**
     * Wallet ID
     *
     * @var string|null
     */
    private ?string $walletId = null;

    /**
     * Wallet address count
     *
     * @var int
     */
    private int $addressCount;

    /**
     * Amount of unconfirmed transactions
     *
     * @var int
     */
    private int $pendingReceivedAmount;

    /**
     * Amount of outgoing unconfirmed transactions
     *
     * @var int
     */
    private int $pendingSentAmount;

    /**
     * Amount of incoming transactions
     *
     * @var int
     */
    private int $receivedAmount;

    /**
     * Amount of outgoing transactions
     *
     * @var int
     */
    private int $sentAmount;

    /**
     * Amount of paid service fee
     *
     * @var int
     */
    private int $serviceFeePaidAmount;

    /**
     * Outgoing transactions count
     *
     * @var int
     */
    private int $sentTx;

    /**
     * Count of incoming transactions
     *
     * @var int
     */
    private int $receivedTx;

    /**
     * Unconfirmed outgoing transactions count
     *
     * @var int
     */
    private int $pendingSentTx;

    /**
     * Amount of unconfirmed transactions
     *
     * @var int
     */
    private int $pendingReceivedTx;

    /**
     * Count of invalid transactions
     *
     * @var int
     */
    private int $invalidTx;

    /**
     * Wallet balance
     *
     * @var int
     */
    private int $balanceAmount;

    /**
     * Creation time in format ISO UTC 0
     *
     * @var string
     */
    private string $createDate;

    /**
     * Date of creation of the wallet in UNIX timestamp format
     *
     * @var int
     */
    private int $createDateTimestamp;

    /**
     * @var int|null
     */
    private ?int $lastUsedNonce = null;

    /**
     * @var string
     */
    private string $walletIdHash;

    /**
     * @var string|null
     */
    private ?string $notificationLinkDomain = null;

    /**
     * @var int
     */
    private int $successCallbacks;

    /**
     * @var int
     */
    private int $failedCallbacks;

    /**
     * @var string
     */
    private string $currency;

    /**
     * @return string|null
     */
    public function getWalletId(): ?string
    {
        return $this->walletId;
    }

    /**
     * @return int
     */
    public function getAddressCount(): int
    {
        return $this->addressCount;
    }

    /**
     * @return int
     */
    public function getPendingReceivedAmount(): int
    {
        return $this->pendingReceivedAmount;
    }

    /**
     * @return int
     */
    public function getPendingSentAmount(): int
    {
        return $this->pendingSentAmount;
    }

    /**
     * @return int
     */
    public function getReceivedAmount(): int
    {
        return $this->receivedAmount;
    }

    /**
     * @return int
     */
    public function getSentAmount(): int
    {
        return $this->sentAmount;
    }

    /**
     * @return int
     */
    public function getServiceFeePaidAmount(): int
    {
        return $this->serviceFeePaidAmount;
    }

    /**
     * @return int
     */
    public function getSentTx(): int
    {
        return $this->sentTx;
    }

    /**
     * @return int
     */
    public function getReceivedTx(): int
    {
        return $this->receivedTx;
    }

    /**
     * @return int
     */
    public function getPendingSentTx(): int
    {
        return $this->pendingSentTx;
    }

    /**
     * @return int
     */
    public function getPendingReceivedTx(): int
    {
        return $this->pendingReceivedTx;
    }

    /**
     * @return int
     */
    public function getInvalidTx(): int
    {
        return $this->invalidTx;
    }

    /**
     * @return int
     */
    public function getBalanceAmount(): int
    {
        return $this->balanceAmount;
    }

    /**
     * @return string
     */
    public function getCreateDate(): string
    {
        return $this->createDate;
    }

    /**
     * @return int
     */
    public function getCreateDateTimestamp(): int
    {
        return $this->createDateTimestamp;
    }

    /**
     * @return int|null
     */
    public function getLastUsedNonce(): ?int
    {
        return $this->lastUsedNonce;
    }

    /**
     * @return string
     */
    public function getWalletIdHash(): string
    {
        return $this->walletIdHash;
    }

    /**
     * @return string|null
     */
    public function getNotificationLinkDomain(): ?string
    {
        return $this->notificationLinkDomain;
    }

    /**
     * @return int
     */
    public function getSuccessCallbacks(): int
    {
        return $this->successCallbacks;
    }

    /**
     * @return int
     */
    public function getFailedCallbacks(): int
    {
        return $this->failedCallbacks;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }
}
