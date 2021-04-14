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

class CreateWalletRequest implements RequestInterface
{
    /**
     * Link to the payment notification handler
     *
     * @var string|null
     */
    private ?string $callbackLink;

    /**
     * Password
     *
     * @var string|null
     */
    private ?string $password;

    /**
     * @param string|null $callbackLink
     * @param string|null $password
     */
    public function __construct(?string $callbackLink = null, ?string $password = null)
    {
        $this->callbackLink = $callbackLink;
        $this->password     = $password;
    }

    /**
     * @return string
     */
    public function getPathParams(): string
    {
        return '/create/wallet';
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
            $this->callbackLink === null ?: 'callback_link' => $this->callbackLink,
            'password' => $this->password
        ];
    }
}
