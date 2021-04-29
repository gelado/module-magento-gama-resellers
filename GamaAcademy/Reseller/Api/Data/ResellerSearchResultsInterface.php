<?php

namespace GamaAcademy\Reseller\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface ResellerSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get list of Resellers.
     *
     * @return \GamaAcademy\Reseller\Api\Data\ResellerInterface[]
     */
    public function getItems();

    /**
     * Set reseller list.
     *
     * @param \GamaAcademy\Reseller\Api\Data\ResellerInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
