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

namespace Bitaps\WalletAPI\Response\SendAllAvailableBalance;

use Bitaps\WalletAPI\Model\Receiver;
use Bitaps\WalletAPI\Response\AbstractResponse;
use JMS\Serializer\Annotation as Serializer;

class SendAllAvailableBalanceResponse extends AbstractResponse
{
    /**
     * @Serializer\SerializedName("tx_list")
     * @Serializer\Type("array<Bitaps\WalletAPI\Model\Receiver>")
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
