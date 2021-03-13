<?php

namespace App\Entity;


/**
 * Interface GenericEntityInterface
 * @package App\Entity
 */
interface GenericEntityInterface
{

    /**
     * @return mixed
     */
    public function getId();

    /**
     * @param $id
     * @return mixed
     */
    public function setId($id);

    /**
     * @return mixed
     */
    public function getDateCreated();

    /**
     * @param \DateTime $dateCreated
     * @return mixed
     */
    public function setDateCreated(\DateTime $dateCreated);

    /**
     * @return mixed
     */
    public function getDateUpdated();

    /**
     * @param \DateTime $dateUpdated
     * @return mixed
     */
    public function setDateUpdated(\DateTime $dateUpdated);

}