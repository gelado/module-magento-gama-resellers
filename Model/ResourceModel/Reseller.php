<?php

namespace GamaAcademy\Reseller\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Reseller extends AbstractDb
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(
            'gama_resellers_rodrigo',
            'id'
        );
    }
}
