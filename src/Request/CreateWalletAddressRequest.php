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

class CreateWalletAddressRequest implements RequestInterface
{
    /**
     * Wallet ID
     *
     * @var string
     */
    private string $walletId;

    /**
     * Link to the payment notification handler
     *
     * @var string|null
     */
    private ?string $callbackLink;

    /**
     * Number of confirmations for payment notification, default 3
     *
     * @var int|null
     */
    private ?int $confirmations;

    /**
     * @param string      $walletId
     * @param string|null $callbackLink
     * @param int         $confirmations
     */
    public function __construct(string $walletId, string $callbackLink = null, int $confirmations = 3)
    {
        $this->walletId = $walletId;
        $this->callbackLink = $callbackLink;
        $this->confirmations = $confirmations;
    }

    /**
     * @return string
     */
    public function getPathParams(): string
    {
        return '/create/wallet/payment/address';
    }

    /**
     * @return array
     */
    public function getHeaders(): array
    {
        return [];
    }

    /**
     * @return array
     */
    public function getBody(): array
    {
        return [
            'wallet_id' => $this->walletId,
            $this->callbackLink === null ?: 'callback_link' => $this->callbackLink,
            'confirmations' => $this->confirmations
        ];
    }
}
