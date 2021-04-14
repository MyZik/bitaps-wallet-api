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

namespace Bitaps\WalletAPI\Request\Wallet;

use Bitaps\WalletAPI\Request\RequestInterface;

class StateRequest implements RequestInterface
{
    /**
     * Wallet ID
     *
     * @var string
     */
    private string $walletId;

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
     * @param float|null  $nonce
     * @param string|null $signature
     */
    public function __construct(string $walletId, ?float $nonce = null, ?string $signature = null)
    {
        $this->walletId  = $walletId;
        $this->nonce     = $nonce;
        $this->signature = $signature;
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
     * @return string
     */
    public function getPathParams(): string
    {
        return sprintf('/wallet/state/%s', $this->walletId);
    }

    /**
     * @return array
     */
    public function getBody(): array
    {
        return [];
    }
}
