<?php
namespace Attraction\Model;
use Attraction\Model\AttractionNews;
use Zend\Db\TableGateway\TableGateway;


class AttractionPosterTable{
    protected $tableGateway;


    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }
    public function fetchAll()
    {
        $resultSet = $this->tableGateway->select();
        return $resultSet;
    }
    public  function getAttractionPosterById($attraction_id){
        $attraction_id = (int)$attraction_id;
        $rowset = $this->tableGateway->select(array('attraction_id' => $attraction_id));
        //query the database
        $row = $rowset->current();
        $row = $rowset;
        return $row;
    }

    public  function getAttractionPosterByIdName($attraction_id_name){
        $attraction_id_name = (string)$attraction_id_name;
        $rowset = $this->tableGateway->select(array("attraction_id_name" => $attraction_id_name));
        //query the database
        $row = $rowset->current();
        return $row;
    }
}