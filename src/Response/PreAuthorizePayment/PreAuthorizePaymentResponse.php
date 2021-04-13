<?php
/*
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

namespace Bitaps\WalletAPI\Response\PreAuthorizePayment;

use Bitaps\WalletAPI\Response\AbstractResponse;

class PreAuthorizePaymentResponse extends AbstractResponse
{
    /**
     * Recent service fee
     *
     * @var int
     */
    private int $fee;

    /**
     * Success
     *
     * @var string
     */
    private string $authorization;

    /**
     * @return int
     */
    public function getFee(): int
    {
        return $this->fee;
    }

    /**
     * @return string
     */
    public function getAuthorization(): string
    {
        return $this->authorization;
    }
}
