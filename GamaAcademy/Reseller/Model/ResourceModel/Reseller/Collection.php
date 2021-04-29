<?php

namespace GamaAcademy\Reseller\Model\ResourceModel\Reseller;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(
            \GamaAcademy\Reseller\Model\Reseller::class,
            \GamaAcademy\Reseller\Model\ResourceModel\Reseller::class
        );
    }
}
