<?php

namespace App\Entity;


/**
 * Class AbstractEntity
 * @package App\Entity
 */
abstract class AbstractEntity
{

    /**
     * @var
     */
    protected $id;

    /**
     * @var
     */
    protected $dateCreated;

    /**
     * @var
     */
    protected $dateUpdated;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    /**
     * @param \DateTime $dateCreated
     * @return $this
     */
    public function setDateCreated(\DateTime $dateCreated)
    {
        $this->dateCreated = $dateCreated;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDateUpdated()
    {
        return $this->dateUpdated;
    }

    /**
     * @param \DateTime $dateUpdated
     * @return $this
     */
    public function setDateUpdated(\DateTime $dateUpdated)
    {
        $this->dateUpdated = $dateUpdated;
        return $this;
    }

}