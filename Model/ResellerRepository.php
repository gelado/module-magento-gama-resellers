<?php

namespace GamaAcademy\Reseller\Model;

use GamaAcademy\Reseller\Api\Data\ResellerSearchResultsInterfaceFactory;
use GamaAcademy\Reseller\Model\Reseller;
use GamaAcademy\Reseller\Model\ResourceModel\Reseller\CollectionFactory;
use GamaAcademy\Reseller\Api\Data\ResellerInterface;
use GamaAcademy\Reseller\Api\ResellerRepositoryInterface;
use GamaAcademy\Reseller\Api\Data\ResellerInterfaceFactory;
use GamaAcademy\Reseller\Model\ResourceModel\Reseller as ResourceModel;
use Magento\Framework\Api\SearchCriteria\CollectionProcessor;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\EntityManager\HydratorInterface;


class ResellerRepository implements ResellerRepositoryInterface
{
    private $resellerFactory;

    private $resource;

    private $collectionFactory;

    private $collectionProcessor;

    private $searchResultsFactory;

    private $hydrator;

    public function __construct(
        CollectionFactory $collectionFactory,
        ResellerInterfaceFactory $resellerFactory,
        ResourceModel $resource,
        CollectionProcessor $collectionProcessor,
        ResellerSearchResultsInterfaceFactory  $searchResultsFactory,
        HydratorInterface $hydrator
    ) {
        $this->collectionFactory = $collectionFactory;
        $this->resellerFactory = $resellerFactory;
        $this->resource = $resource;
        $this->collectionProcessor = $collectionProcessor;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->hydrator = $hydrator;
    }


    public function getById($idReseller)
    {
        $reseller = $this->resellerFactory->create();
        $this->resource->load($reseller, $idReseller);
        if (!$reseller->getId()) {
            throw new NoSuchEntityException(__('ID "%1" not found.', $idReseller));
        }
        return $reseller;
    }


    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria)
    {
        $collection = $this->collectionFactory->create();

        $this->collectionProcessor->process($searchCriteria, $collection);

        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }


    public function save(ResellerInterface $reseller)
    {
        if ($reseller->getId() && $reseller instanceof Reseller && !$reseller->getOrigData()) {
            $reseller = $this->hydrator->hydrate($this->getById($reseller->getId()), $this->hydrator->extract($reseller));
        }

        try {
            $this->resource->save($reseller);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__($exception->getMessage()));
        }
        return $reseller;
    }


    public function delete(ResellerInterface $reseller)
    {
        try {
            $this->resource->delete($reseller);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__($exception->getMessage()));
        }
        return true;
    }

    public function deleteById($idReseller)
    {
        return $this->delete($this->getById($idReseller));
    }
}
