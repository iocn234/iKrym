<?php
namespace Restaurant\Model;
use Restaurant\Model\Restaurant;
use Zend\Db\TableGateway\TableGateway;

class RestaurantMenuTable{
    protected $tableGateway;
    protected $resultSet;
    public  function __construct(TableGateway $tableGateway){
        $this->tableGateway = $tableGateway;
    }

    public function getMenu(){

    }
    public  function fetchAll(){
        $resultSet =   $this->tableGateway->select();
        return $resultSet;

    }

    public function getRestaurantMenu($restaurant_menu_id){
        $restaurant_menu_id= (int)$restaurant_menu_id;
        $resultSet = $this->tableGateway->select(array('restaurant_menu_id' =>$restaurant_menu_id));
        $row = $resultSet->current();
        return $row;
    }

    public  function getRestaurantMenuByNameId($restaurant_id_name){
        /*
         *      SELECT restaurant_menu_type
                FROM  `restaurant_menu`
                WHERE restaurant_id_name =  'grilbar'
         */
        $restaurant_id_name = (string)$restaurant_id_name;

        $rowset = $this->tableGateway->select(array('restaurant_id_name' => $restaurant_id_name));
        return $rowset;
    }
    public  function saveRestaurantMenu(RestaurantMenu $restaurant){
        $data = array(
//            'id' => $restaurant->id,
//            'restaurant_id_name' => $restaurant->restaurant_id_name,
//            'restaurant_name' => $restaurant->restaurant_name,
//            'restaurant_mode' => $restaurant->restaurant_mode,
//            'restaurant_description' => $restaurant->restaurant_description,
//            'restaurant_thumbnail' => $restaurant->restaurant_thumbnail,
//            'restaurant_average_account' => $restaurant->restaurant_average_account,
//            'restaurant_directions' => $restaurant->restaurant_directions,
//            'restaurant_work_time' => $restaurant->restaurant_work_time,
//            'restaurant_telephone' => $restaurant->restaurant_telephone,
//            'restaurant_address' => $restaurant->restaurant_address,
//            'restaurant_site' => $restaurant->restaurant_site,
//            'restaurant_longitude' => $restaurant->restaurant_longitude,
//            'restaurant_latitude' => $restaurant->restaurant_latitude,
//            'restaurant_vk' => $restaurant->restaurant_vk,
//            'restaurant_facebook' => $restaurant->restaurant_facebook,
//            'restaurant_foursquare' => $restaurant->restaurant_foursquare
        );
        $restaurant_id = (int)$restaurant->id;
        if($restaurant_id){
            $this->tableGateway->insert($restaurant_id);
        }
        else{
            if($this->getRestaurant($restaurant_id)){
                $this->tableGateway->update($data,array('id' => $restaurant_id));
            }
            else{
                throw new \Exception('Form id does not exist');
            }
        }
    }
    public  function deleteRestaurant($restaurant_id){
        $this->tableGateway->delete(array('id' => $restaurant_id));
    }

}