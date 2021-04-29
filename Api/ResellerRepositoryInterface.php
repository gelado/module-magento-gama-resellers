<?php

namespace GamaAcademy\Reseller\Api;

use GamaAcademy\Reseller\Api\Data\ResellerInterface;
use Magento\Framework\Api\SearchCriteriaInterface;

interface ResellerRepositoryInterface {
    /**
     * @param $idReseller
     * @return mixed
     */
    public function getById($idReseller);

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return mixed
     */
    public function getList(SearchCriteriaInterface $searchCriteria);

    /**
     * @param ResellerInterface $reseller
     * @return mixed
     */
    public function save(ResellerInterface $reseller);

    /**
     * @param ResellerInterface $reseller
     * @return mixed
     */
    public function delete(ResellerInterface $reseller);

    /**
     * @param $idReseller
     * @return mixed
     */
    public function deleteById($idReseller);
}
