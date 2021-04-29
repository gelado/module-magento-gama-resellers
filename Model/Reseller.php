<?php

namespace GamaAcademy\Reseller\Model;

use GamaAcademy\Reseller\Api\Data\ResellerInterface;
use Magento\Framework\Model\AbstractModel;

class Reseller extends AbstractModel implements ResellerInterface
{
    protected function _construct()
    {
        $this->_init(\GamaAcademy\Reseller\Model\ResourceModel\Reseller::class);
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->getData(self::ID);
    }

    /**
     * @return bool|null
     */
    public function isActive(): ?bool
    {
        return $this->getData(self::ACTIVE);
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->getData(self::NAME);
    }

    /**
     * @return string|null
     */
    public function getCpf(): ?string
    {
        return $this->getData(self::CPF);
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->getData(self::EMAIL);
    }

    /**
     * @return string|null
     */
    public function getPhone(): ?string
    {
        return $this->getData(self::PHONE);
    }

    /**
     * @return string|null
     */
    public function getCity(): ?string
    {
        return $this->getData(self::CITY);
    }

    /**
     * @return string|null
     */
    public function getProducts(): ?string
    {
        return $this->getData(self::PRODUCTS);
    }

    /**
     * @return string|null
     */
    public function getObs(): ?string
    {
        return $this->getData(self::OBS);
    }

    /**
     * @return string|null
     */
    public function getCreationTime(): ?string
    {
        return $this->getData(self::CREATION_TIME);
    }

    /**
     * @return string|null
     */
    public function getUpdateTime(): ?string
    {
        return $this->getData(self::UPDATE_TIME);
    }

    /**
     * @param int $id
     * @return ResellerInterface
     */
    public function setId($id): ResellerInterface
    {
        return $this->setData(self::ID, $id);
    }

    /**
     * @param bool $active
     * @return ResellerInterface
     */
    public function setActive($active): ResellerInterface
    {
        return $this->setData(self::ACTIVE, $active);
    }

    /**
     * @param string $name
     * @return ResellerInterface
     */
    public function setName($name): ResellerInterface
    {
        return $this->setData(self::NAME, $name);
    }

    /**
     * @param string $cpf
     * @return ResellerInterface
     */
    public function setCpf($cpf): ResellerInterface
    {
        return $this->setData(self::CPF, $cpf);
    }

    /**
     * @param string $email
     * @return ResellerInterface
     */
    public function setEmail($email): ResellerInterface
    {
        return $this->setData(self::EMAIL, $email);
    }

    /**
     * @param string $city
     * @return ResellerInterface
     */
    public function setCity($city): ResellerInterface
    {
        return $this->setData(self::CITY, $city);
    }

    /**
     * @param string $products
     * @return ResellerInterface
     */
    public function setProducts($products): ResellerInterface
    {
        return $this->setData(self::PRODUCTS, $products);
    }

    /**
     * @param string $products
     * @return ResellerInterface
     */
    public function setPhone($phone): ResellerInterface
    {
        return $this->setData(self::PHONE, $phone);
    }

    /**
     * @param string $obs
     * @return ResellerInterface
     */
    public function setObs($obs): ResellerInterface
    {
        return $this->setData(self::OBS, $obs);
    }

    /**
     * @param string $creationTime
     * @return ResellerInterface
     */
    public function setCreationTime($creationTime): ResellerInterface
    {
        return $this->setData(self::CREATION_TIME, $creationTime);
    }

    /**
     * @param string $updateTime
     * @return ResellerInterface
     */
    public function setUpdateTime($updateTime): ResellerInterface
    {
        return $this->setData(self::UPDATE_TIME, $updateTime);
    }


}
