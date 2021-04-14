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

namespace Bitaps\WalletAPI\Request;

class SendCommitmentPaymentRequest implements RequestInterface
{
    /**
     * Wallet ID
     *
     * @var string
     */
    private string $walletId;

    /**
     * Address
     *
     * @var string
     */
    private string $address;

    /**
     * Amount in satoshi
     *
     * @var int
     */
    private int $amount;

    /**
     * Nonce used for HMAC signature
     *
     * @var float|null
     */
    private ?float $nonce;

    /**
     * HMAC signature
     *
     * @var string|null
     */
    private ?string $signature;

    /**
     * @param string      $walletId
     * @param string      $address
     * @param int         $amount
     * @param float|null  $nonce
     * @param string|null $signature
     */
    public function __construct(string $walletId, string $address, int $amount, ?float $nonce, ?string $signature)
    {
        $this->walletId  = $walletId;
        $this->address   = $address;
        $this->amount    = $amount;
        $this->nonce     = $nonce;
        $this->signature = $signature;
    }

    /**
     * @return string
     */
    public function getPathParams(): string
    {
        return sprintf('/wallet/send/payment/with/commitment/%s', $this->walletId);
    }

    /**
     * @return array
     */
    public function getHeaders(): array
    {
        return [
            'Access-Nonce' => $this->nonce,
            'Access-Signature' => $this->signature
        ];
    }

    /**
     * @return array[]
     */
    public function getBody(): array
    {
        return [
            'receiver' => [
                'address' => $this->address,
                'amount' => $this->amount
            ]
        ];
    }
}
