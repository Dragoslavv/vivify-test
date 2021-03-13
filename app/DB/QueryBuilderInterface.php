<?php

namespace App\DB;


/**
 * Interface QueryBuilderInterface
 * @package App\DB
 */
interface QueryBuilderInterface
{
    /**
     * @param $sql
     * @return mixed
     */
    public function prepare($sql );

    /**
     * @param $sql
     * @return mixed
     */
    public function query($sql );

    /**
     * @return mixed
     */
    public function execute(  );

}