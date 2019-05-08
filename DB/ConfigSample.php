<?php

use Qpdb\PdoWrapper\Exceptions\PdoWrapperException;
use Qpdb\PdoWrapper\Helpers\QueryTimer;
use Qpdb\PdoWrapper\Interfaces\PdoWrapperConfigInterface;

class ConfigSample implements PdoWrapperConfigInterface
{


    /**
     * @return string
     */
    public function getHost()
    {
        return 'localhost';
    }

    /**
     * @return string
     */
    public function getUser()
    {
        return 'test1';
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return '47xc59v31';
    }

    /**
     * @return string
     */
    public function getDbName()
    {
        return 'next';
    }

    /**
     * @return array
     */
    public function getPdoOptions(){
        return [
           \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        ];
    }

    public function getExecCommands() {
        return [
           "SET time_zone='+00:00'",
        ];
    }

    /**
     * @param \Exception $e
     * @param array $otherInformation
     */
    public function handlePdoException( \Exception $e, $otherInformation = [] )
    {
        //log error message
        throw new \Exception( $e->getMessage() );
    }


    /**
     * @param string     $query
     * @param QueryTimer $timer
     * @return void
     */
    public function handlePdoExecute( $query, QueryTimer $timer ) {
        // TODO: Implement handlePdoExecute() method.
    }
}