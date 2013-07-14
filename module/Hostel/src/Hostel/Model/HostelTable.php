<?php
        namespace Hostel\Model;


        use Hostel\Model\Hostel;
        use Zend\Db\TableGateway\TableGateway;

        class HostelTable{
            protected $tableGateway;
            public  function __construct(TableGateway $tableGateway){
                    $this->tableGateway = $tableGateway;
            }
            public  function fetchAll(){
                    $resultSet =   $this->tableGateway->select();
                    return $resultSet;

            }
            public function getHostel($id){
                $hostel_id = (int)$id;
                $resultSet = $this->tableGateway->select(array('hostel_id' => $hostel_id));
                $row = $resultSet->current();
                return $row;
             }

            public  function getHostelByNameId($hostel_name_route){
                $hostel_name_route = (string)$hostel_name_route;
                $rowset = $this->tableGateway->select(array('hostel_name_route' => $hostel_name_route));
                $row = $rowset->current();
                return $row;
            }

            public  function saveHostel(Hostel $hostel){
                $data = array(
                    //'id' => (int)$restaurant->id,
                    'hostel_name_route' => $hostel->hostel_name_route,
                    'hostel_name' => $hostel->hostel_name,
                   'hostel_image' => $hostel->hostel_image,
                    'hostel_description' => $hostel->hostel_description,
                    'hostel_start_count' => $hostel->hostel_start_count,
                    'hostel_longitude' => $hostel->hostel_longitude,
                    'hostel_latitude' => $hostel->hostel_latitude,
                    'hostel_features' => $hostel->hostel_features,
                    'hostel_site' => $hostel->hostel_site,
                    'hostel_address' => $hostel->hostel_address,
                    'hostel_telephone' => $hostel->hostel_telephone,
                    'hostel_work_time' => $hostel->hostel_work_time,
                );
                     $hostel_id = (int)$hostel->hostel_id;
                    if($hostel_id == 0){
                        $this->tableGateway->insert($data);
                    }
                    else{
                        if($this->getHostel($hostel_id)){
                            $this->tableGateway->update($data,array('hostel_id' => $hostel_id));
                        }
                        else{
                            throw new \Exception('Form id does not exist');
                        }
                    }
            }
            public  function deleteHostel($hostel_id){
                   $this->tableGateway->delete(array('hostel_id' => $hostel_id));
            }

        }