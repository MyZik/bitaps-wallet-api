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

namespace Bitaps\WalletAPI\Response\Addresses\Model;

use Bitaps\WalletAPI\Model\PendingTransaction;
use JMS\Serializer\Annotation as Serializer;

class PendingTransactions
{
    /**
     * @Serializer\SerializedName("tx_list")
     * @Serializer\Type("array<Bitaps\WalletAPI\Model\PendingTransaction>")
     *
     * @var PendingTransaction[]
     */
    private array $txList;

    /**
     * @Serializer\SerializedName("next_page")
     * @Serializer\Type("bool")
     *
     * @var bool
     */
    private bool $nextPage;

    /**
     * @return PendingTransaction[]
     */
    public function getTxList(): array
    {
        return $this->txList;
    }

    /**
     * @return bool
     */
    public function isNextPage(): bool
    {
        return $this->nextPage;
    }
}
