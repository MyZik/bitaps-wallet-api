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

namespace Bitaps\WalletAPI\Response\Commitments;

use Bitaps\WalletAPI\Response\AbstractResponse;
use JMS\Serializer\Annotation as Serializer;

class CommitmentsResponse extends AbstractResponse
{
    /**
     * @todo Convert array to object
     *
     * @Serializer\SerializedName("commitments_list")
     * @Serializer\Type("array")
     *
     * @var array
     */
    private array $commitmentsList;

    /**
     * @var bool
     */
    private bool $nextPage;

    /**
     * @return array
     */
    public function getCommitmentsList(): array
    {
        return $this->commitmentsList;
    }

    /**
     * @return bool
     */
    public function isNextPage(): bool
    {
        return $this->nextPage;
    }
}
