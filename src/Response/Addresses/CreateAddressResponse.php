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

namespace Bitaps\WalletAPI\Response\Addresses;

use Bitaps\WalletAPI\Response\AbstractResponse;

class CreateAddressResponse extends AbstractResponse
{
    /**
     * Public ID for payment address
     *
     * @var string
     */
    private string $invoice;

    /**
     * Payment code, used to authenticate payment notifications (this code should not be disclosed for security reasons)
     *
     * @var string
     */
    private string $paymentCode;

    /**
     * Payment address
     *
     * @var string
     */
    private string $address;

    /**
     * Payment address in old format
     *
     * @var string|null
     */
    private ?string $legacyAddress;

    /**
     * Number of confirmations for payment notification
     *
     * @var int
     */
    private int $confirmations;

    /**
     * Link to the payment notification handler
     *
     * @var string|null
     */
    private ?string $callbackLink;

    /**
     * @var string|null
     */
    private ?string $notificationLinkDomain;

    /**
     * Wallet ID
     *
     * @var string|null
     */
    private ?string $walletId;

    /**
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
    public function getInvoice(): string
    {
        return $this->invoice;
    }

    /**
     * @return string
     */
    public function getPaymentCode(): string
    {
        return $this->paymentCode;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @return string|null
     */
    public function getLegacyAddress(): ?string
    {
        return $this->legacyAddress;
    }

    /**
     * @return int
     */
    public function getConfirmations(): int
    {
        return $this->confirmations;
    }

    /**
     * @return string|null
     */
    public function getCallbackLink(): ?string
    {
        return $this->callbackLink;
    }

    /**
     * @return string|null
     */
    public function getNotificationLinkDomain(): ?string
    {
        return $this->notificationLinkDomain;
    }

    /**
     * @return string|null
     */
    public function getWalletId(): ?string
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
