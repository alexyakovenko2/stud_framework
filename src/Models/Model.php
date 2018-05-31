<?php

namespace Mindk\Framework\Models;

use Mindk\Framework\DB\DBOConnectorInterface;

/**
 * Basic Model Class
 * @package Mindk\Framework\Models
 */
abstract class Model
{
    /**
     * @var string  DB Table name
     */
    protected $tableName = '';

    /**
     * @var string  DB Table primary key
     */
    protected $primaryKey = 'id';

    /**
     * @var null
     */
    protected $dbo = null;

    /**
     * Model constructor.
     * @param DBOConnectorInterface $db
     */
    public function __construct(DBOConnectorInterface $db)
    {
        $this->dbo = $db;
    }

    /**
     * Create new record
     */
    public function create( $data ) {
        //@TODO: Implement this
    }

    /**
     * Read record
     *
     * @param   int Record ID
     *
     * @return  object
     */
    public function load( $id ) {
        $sql = 'SELECT * FROM `' . $this->tableName .
            '` WHERE `'.$this->primaryKey.'`='.(int)$id; //!

        return $this->dbo->setQuery($sql)->getResult($this);
    }

    /**
     * Save record state to db
     *
     * @return bool
     */
    public function save() {
        //@TODO: Implement this
    }

    /**
     * Delete record from DB
     */
    public function delete() {
        //@TODO: Implement this
    }

    /**
     * Get list of records
     *
     * @return array
     */
    public function getList() {
        $sql = 'SELECT * FROM `' . $this->tableName . '` WHERE `'.$this->sortStatusTwo.'` = ' . $this->param . ' ';

        return $this->dbo->setQuery($sql)->getList(get_class($this));
    }

    /**
     * Get vip-list of records
     *
     * @return array
     */
    public function getSortList() {
        $sql = 'SELECT * FROM `' . $this->tableName . '` WHERE `'.$this->sortStatusOne.'` = ' . $this->param . ' 
            AND `'.$this->sortStatusTwo.'` = ' . $this->param . ' ';       
        
        return $this->dbo->setQuery($sql)->getList(get_class($this));
    }

    /**
     * Get categories-list of records
     *
     * @return array
     */
    public function getListCategory() {
        $sql = 'SELECT * FROM `' . $this->tableName . '` ';       
        
        return $this->dbo->setQuery($sql)->getList(get_class($this));
    }

    public function getListCity() {

        $sql = 'SELECT * , `city`.`city` AS `city` 
        FROM `region` 
        INNER JOIN `city` ON `city`.`id_region` = `region`.`id` ';       
        
        return $this->dbo->setQuery($sql)->getList(get_class($this));
    }


}