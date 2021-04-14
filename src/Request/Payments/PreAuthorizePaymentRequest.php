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

namespace Bitaps\WalletAPI\Request\Payments;

use Bitaps\WalletAPI\Request\RequestInterface;

class PreAuthorizePaymentRequest implements RequestInterface
{
    /**
     * Wallet ID
     *
     * @var string
     */
    private string $walletId;

    /**
     * Receivers list [{"address":{address}, "amount":{amount}, ...], maximum 100 recipients
     *
     * @var array
     */
    private array $receiversList;

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
     * @param array       $receiversList
     * @param float|null  $nonce
     * @param string|null $signature
     */
    public function __construct(string $walletId, array $receiversList, ?float $nonce = null, ?string $signature = null)
    {
        $this->walletId      = $walletId;
        $this->receiversList = $receiversList;
        $this->nonce         = $nonce;
        $this->signature     = $signature;
    }

    /**
     * @return string
     */
    public function getPathParams(): string
    {
        return sprintf('/wallet/send/payment/preauthorize/%s', $this->walletId);
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
            'receivers_list' => $this->receiversList,
        ];
    }
}
