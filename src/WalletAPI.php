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

namespace Bitaps\WalletAPI;

use Bitaps\WalletAPI\Exception\BitapsAPIException;
use Bitaps\WalletAPI\Request\CreateWalletAddressRequest;
use Bitaps\WalletAPI\Request\CreateWalletRequest;
use Bitaps\WalletAPI\Request\AddressesRequest;
use Bitaps\WalletAPI\Request\AddressTransactionsRequest;
use Bitaps\WalletAPI\Request\SendPaymentRequest;
use Bitaps\WalletAPI\Request\WalletDailyStatisticsRequest;
use Bitaps\WalletAPI\Request\WalletStateRequest;
use Bitaps\WalletAPI\Request\WalletTransactionsRequest;
use Bitaps\WalletAPI\Response\CreateWallet\CreateWalletResponse;
use Bitaps\WalletAPI\Response\Addresses\GetAddressesResponse;
use Bitaps\WalletAPI\Response\CreateWalletAddress\CreateWalletAddressResponse;
use Bitaps\WalletAPI\Response\AddressTransactions\AddressTransactionsResponse;
use Bitaps\WalletAPI\Response\SendPayment\SendPaymentResponse;
use Bitaps\WalletAPI\Response\WalletDailyStatistics\WalletDailyStatisticsResponse;
use Bitaps\WalletAPI\Response\WalletState\WalletStateResponse;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

class WalletAPI
{
    /**
     * @var string
     */
    private string $endpoint;

    /**
     * @var string|null
     */
    private ?string $walletId;

    /**
     * @var string|null
     */
    private ?string $password;

    /**
     * Receivers list for sendPayment method
     *
     * @var array
     */
    private array $receiversList;

    /**
     * @param string      $endpoint
     * @param string|null $walletId
     * @param string|null $password
     */
    public function __construct(string $endpoint, string $walletId = null, string $password = null)
    {
        $this->endpoint = $endpoint;
        $this->walletId = $walletId;
        $this->password = $password;
    }

    /**
     * @param string $path
     * @param string $method
     * @param array  $headers
     * @param array  $body
     *
     * @return string
     * @throws BitapsAPIException
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    private function call(string $path, string $method, array $headers = [], array $body = []): string
    {
        $client   = HttpClient::create();
        $fullPath = sprintf('%s%s', $this->endpoint, $path);

        $options = [];

        if (!empty($headers)) {
            $options['headers'] = $headers;
        }

        if (!empty($body)) {
            $options['json'] = $body;
        }

        $request  = $client->request($method, $fullPath, $options);
        $response = $request->toArray(false);

        if (isset($response['error_code'])) {
            throw new BitapsAPIException(sprintf('Got an error response with message: %s.', $response['message']));
        }

        return $request->getContent();
    }

    /**
     * @return array
     */
    private function getAccess(): array
    {
        $nonce     = round(microtime(true) * 1000);
        $key       = hash('sha256', hash('sha256', $this->walletId . $this->password, true), true);
        $msg       = $this->walletId . $nonce;
        $signature = hash_hmac('sha256', $msg, $key);

        return [$nonce, $signature];
    }

    /**
     * @param string|null $callbackLink
     * @param string|null $password
     *
     * @return CreateWalletResponse
     * @throws BitapsAPIException
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     * @throws \JsonException
     */
    public function createWallet(string $callbackLink = null, string $password = null): CreateWalletResponse
    {
        $request = new CreateWalletRequest($callbackLink, $password);

        $response = $this->call($request->getPathParams(), 'POST', $request->getHeaders(), $request->getBody());

        return CreateWalletResponse::fromJson($response);
    }

    /**
     * @param string|null $callbackLink
     * @param int         $confirmations
     *
     * @return CreateWalletAddressResponse
     * @throws BitapsAPIException
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     * @throws \JsonException
     */
    public function addAddress(string $callbackLink = null, int $confirmations = 3): CreateWalletAddressResponse
    {
        $request = new CreateWalletAddressRequest($this->walletId, $callbackLink, $confirmations);

        $response = $this->call($request->getPathParams(), 'POST', $request->getHeaders(), $request->getBody());

        return CreateWalletAddressResponse::fromJson($response);
    }

    /**
     * @param string $address
     * @param int    $amount
     *
     * @return $this
     */
    public function &addPayment(string $address, int $amount): WalletAPI
    {
        $this->receiversList[] = [
            'address' => $address,
            'amount' => $amount
        ];

        return $this;
    }

    /**
     * @return SendPaymentResponse
     * @throws BitapsAPIException
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     * @throws \JsonException
     */
    public function pay(): SendPaymentResponse
    {
        [$nonce, $signature] = $this->getAccess();
        $request = new SendPaymentRequest($this->walletId, $this->receiversList, $nonce, $signature);

        $response = $this->call($request->getPathParams(), 'POST', $request->getHeaders(), $request->getBody());

        return SendPaymentResponse::fromJson($response);
    }

    /**
     * @return WalletStateResponse
     *
     * @throws BitapsAPIException
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     * @throws \JsonException
     */
    public function getWalletState(): WalletStateResponse
    {
        [$nonce, $signature] = $this->getAccess();
        $request = new WalletStateRequest($this->walletId, $nonce, $signature);

        $response = $this->call($request->getPathParams(), 'GET', $request->getHeaders(), $request->getBody());

        return WalletStateResponse::fromJson($response);
    }

    /**
     * @param int|null $from
     * @param int|null $to
     * @param int|null $limit
     * @param int|null $page
     *
     * @return AddressTransactionsResponse
     * @throws BitapsAPIException
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     * @throws \JsonException
     */
    public function getTransactions(
        int $from = null,
        int $to = null,
        int $limit = null,
        int $page = null
    ): AddressTransactionsResponse {
        [$nonce, $signature] = $this->getAccess();
        $request = new WalletTransactionsRequest($this->walletId, $nonce, $signature, $from, $to, $limit, $page);

        $response = $this->call($request->getPathParams(), 'GET', $request->getHeaders(), $request->getBody());

        return AddressTransactionsResponse::fromJson($response);
    }

    /**
     * @param int|null $from
     * @param int|null $to
     * @param int|null $limit
     * @param int|null $page
     *
     * @return GetAddressesResponse
     * @throws BitapsAPIException
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     * @throws \JsonException
     */
    public function getAddresses(
        int $from = null,
        int $to = null,
        int $limit = null,
        int $page = null
    ): GetAddressesResponse {
        [$nonce, $signature] = $this->getAccess();
        $request = new AddressesRequest($this->walletId, $nonce, $signature, $from, $to, $limit, $page);

        $response = $this->call($request->getPathParams(), 'GET', $request->getHeaders(), $request->getBody());

        return GetAddressesResponse::fromJson($response);
    }

    /**
     * @param string   $address
     * @param int|null $from
     * @param int|null $to
     * @param int|null $limit
     * @param int|null $page
     *
     * @return AddressTransactionsResponse
     * @throws BitapsAPIException
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     * @throws \JsonException
     */
    public function getAddressTransactions(
        string $address,
        int $from = null,
        int $to = null,
        int $limit = null,
        int $page = null
    ): AddressTransactionsResponse {
        [$nonce, $signature] = $this->getAccess();
        $request = new AddressTransactionsRequest(
            $this->walletId,
            $address,
            $nonce,
            $signature,
            $from,
            $to,
            $limit,
            $page
        );

        $response = $this->call($request->getPathParams(), 'GET', $request->getHeaders(), $request->getBody());

        return AddressTransactionsResponse::fromJson($response);
    }

    /**
     * @param int|null $from
     * @param int|null $to
     * @param int|null $limit
     * @param int|null $page
     *
     * @return WalletDailyStatisticsResponse
     * @throws BitapsAPIException
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public function getDailyStatistics(
        int $from = null,
        int $to = null,
        int $limit = null,
        int $page = null
    ): WalletDailyStatisticsResponse {
        [$nonce, $signature] = $this->getAccess();
        $request = new WalletDailyStatisticsRequest($this->walletId, $nonce, $signature, $from, $to, $limit, $page);

        $response = $this->call($request->getPathParams(), 'GET', $request->getHeaders(), $request->getBody());

        return WalletDailyStatisticsResponse::fromJson($response);
    }
}
