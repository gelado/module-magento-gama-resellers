<?php

namespace GamaAcademy\Reseller\Api\Data;

interface ResellerInterface {
    const ID                = 'id';
    const ACTIVE            = 'active';
    const NAME              = 'name';
    const CPF               = 'cpf';
    const EMAIL             = 'email';
    const PHONE             = 'phone';
    const CITY              = 'city';
    const PRODUCTS          = 'products';
    const OBS               = 'obs';
    const CREATION_TIME     = 'creation_time';
    const UPDATE_TIME       = 'update_time';

    /**
     * @return int|null
     */
    public function getId(): ?int;

    /**
     * @return bool|null
     */
    public function isActive(): ?bool;

    /**
     * @return string|null
     */
    public function getName(): ?string;

    /**
     * @return string|null
     */
    public function getCpf(): ?string;

    /**
     * @return string|null
     */
    public function getEmail(): ?string;

    /**
     * @return string|null
     */
    public function getCity(): ?string;

    /**
     * @return string|null
     */
    public function getProducts(): ?string;

    /**
     * @return string|null
     */
    public function getObs(): ?string;

    /**
     * @return string|null
     */
    public function getPhone(): ?string;

    /**
     * @return string|null
     */
    public function getCreationTime(): ?string;

    /**
     * @return string|null
     */
    public function getUpdateTime(): ?string;

    /**
     * @param int $id
     * @return ResellerInterface
     */
    public function setId($id): ResellerInterface;

    /**
     * @param bool $active
     * @return ResellerInterface
     */
    public function setActive($active): ResellerInterface;

    /**
     * @param string $name
     * @return ResellerInterface
     */
    public function setName($name): ResellerInterface;

    /**
     * @param string $cpf
     * @return ResellerInterface
     */
    public function setCpf($cpf): ResellerInterface;

    /**
     * @param string $email
     * @return ResellerInterface
     */
    public function setEmail($email): ResellerInterface;

    /**
     * @param string $phone
     * @return ResellerInterface
     */
    public function setPhone($phone): ResellerInterface;

    /**
     * @param string $city
     * @return ResellerInterface
     */
    public function setCity($city): ResellerInterface;

    /**
     * @param string $products
     * @return ResellerInterface
     */
    public function setProducts($products): ResellerInterface;

    /**
     * @param string $obs
     * @return ResellerInterface
     */
    public function setObs($obs): ResellerInterface;

    /**
     * @param string $creationTime
     * @return ResellerInterface
     */
    public function setCreationTime($creationTime): ResellerInterface;

    /**
     * @param string $updateTime
     * @return ResellerInterface
     */
    public function setUpdateTime($updateTime): ResellerInterface;
}
