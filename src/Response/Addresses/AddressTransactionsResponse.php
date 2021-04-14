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

namespace Bitaps\WalletAPI\Response\Addresses;

use Bitaps\WalletAPI\Response\AbstractResponse;
use Bitaps\WalletAPI\Response\Addresses\Model\PendingTransactions;
use Bitaps\WalletAPI\Response\Addresses\Model\Transactions;
use JMS\Serializer\Annotation as Serializer;

class AddressTransactionsResponse extends AbstractResponse
{
    /**
     * @Serializer\SerializedName("transactions")
     * @Serializer\Type("Bitaps\WalletAPI\Response\Addresses\Model\Transactions")
     *
     * @var Transactions
     */
    private Transactions $transactions;

    /**
     * @Serializer\SerializedName("pending_transactions")
     * @Serializer\Type("Bitaps\WalletAPI\Response\Addresses\Model\PendingTransactions")
     *
     * @var PendingTransactions
     */
    private PendingTransactions $pendingTransactions;

    /**
     * @return Transactions
     */
    public function getTransactions(): Transactions
    {
        return $this->transactions;
    }

    /**
     * @return PendingTransactions
     */
    public function getPendingTransactions(): PendingTransactions
    {
        return $this->pendingTransactions;
    }
}