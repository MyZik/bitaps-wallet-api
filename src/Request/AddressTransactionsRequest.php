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

namespace Bitaps\WalletAPI\Request;

class AddressTransactionsRequest implements RequestInterface
{
    /**
     * Wallet ID
     *
     * @var string
     */
    public string $walletId;

    /**
     * Address
     *
     * @var string
     */
    private string $address;

    /**
     * Nonce used for HMAC signature
     *
     * @var float|null
     */
    public ?float $nonce;

    /**
     * HMAC signature
     *
     * @var string|null
     */
    public ?string $signature;

    /**
     * Beginning of range in unix timestamp
     *
     * @var int|null
     */
    private ?int $from;

    /**
     * Ending of range in unix timestamp
     *
     * @var int|null
     */
    private ?int $to;

    /**
     * Records on page
     *
     * @var int|null
     */
    private ?int $limit;

    /**
     * Page number
     *
     * @var int|null
     */
    private ?int $page;

    /**
     * @param string      $walletId
     * @param string      $address
     * @param float|null  $nonce
     * @param string|null $signature
     * @param int|null    $from
     * @param int|null    $to
     * @param int|null    $limit
     * @param int|null    $page
     */
    public function __construct(
        string $walletId,
        string $address,
        float $nonce = null,
        string $signature = null,
        int $from = null,
        int $to = null,
        int $limit = null,
        int $page = null
    ) {
        $this->walletId  = $walletId;
        $this->address   = $address;
        $this->nonce     = $nonce;
        $this->signature = $signature;
        $this->from      = $from;
        $this->to        = $to;
        $this->limit     = $limit;
        $this->page      = $page;
    }

    /**
     * @return string
     */
    public function getPathParams(): string
    {
        return sprintf(
            "/wallet/address/transactions/%s/%s?from=%d&to=%d&limit=%d&page=%d",
            $this->walletId,
            $this->address,
            $this->from,
            $this->to,
            $this->limit,
            $this->page
        );
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
     * @return array
     */
    public function getBody(): array
    {
        return [];
    }
}
