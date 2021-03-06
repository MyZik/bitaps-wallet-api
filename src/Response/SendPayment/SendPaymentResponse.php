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

namespace Bitaps\WalletAPI\Response\SendPayment;

use Bitaps\WalletAPI\Response\AbstractResponse;
use Bitaps\WalletAPI\Response\SendPayment\Model\Receiver;
use JMS\Serializer\Annotation as Serializer;

class SendPaymentResponse extends AbstractResponse
{
    /**
     * @Serializer\SerializedName("tx_list")
     * @Serializer\Type("array<Bitaps\WalletAPI\Response\SendPayment\Model\Receiver>")
     *
     * @var Receiver[]
     */
    private array $txList;

    /**
     * @return Receiver[]
     */
    public function getTxList(): array
    {
        return $this->txList;
    }
}
