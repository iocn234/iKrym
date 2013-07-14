<?php
namespace Cafe\Model;
use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;

class Cafe{

    public $cafe_id;
    public $cafe_id_name;
    public $cafe_name;
    public $cafe_description;
    public $cafe_thumbnail;
    public $cafe_images;
    public $cafe_average_account;
    public $cafe_directions;
    public $cafe_work_time;
    public $cafe_telephone;
    public $cafe_address;
    public $cafe_site;

    public $cafe_longitude;
    public $cafe_latitude;

    public $cafe_vk;
    public $cafe_facebook;
    public $cafe_foursquare;
    public $cafet_google_plus;

    public $cafe_wifi;
    public $cafe_parking;

    protected $inputFilter;

    public  function exchangeArray($data){
        $this->cafe_id  = (!empty($data['cafe_id'])) ? $data['cafe_id'] : null;
        $this->cafe_id_name  = (!empty($data['cafe_id_name'])) ? $data['cafe_id_name'] : null;
        $this->cafe_name = (!empty($data['cafe_name'])) ? $data['cafe_name'] : null;
       // $this->restaurant_mode = (!empty($data['restaurant_mode'])) ? $data['restaurant_mode'] : null;
        $this->cafe_description = (!empty($data['cafe_description'])) ? $data['cafe_description'] : null;
        $this->cafe_thumbnail = (!empty($data['cafe_thumbnail'])) ? $data['cafe_thumbnail'] : null;
        $this->cafe_images = (!empty($data['cafe_images'])) ? $data['cafe_images'] : null;
        $this->cafe_average_account = (!empty($data['cafe_average_account'])) ? $data['cafe_average_account'] : null;
        $this->cafe_directions = (!empty($data['cafe_directions'])) ? $data['cafe_directions'] : null;
        $this->cafe_work_time = (!empty($data['cafe_work_time'])) ? $data['cafe_work_time'] : null;
        $this->cafe_telephone = (!empty($data['cafe_telephone'])) ? $data['cafe_telephone'] : null;
        $this->cafe_address = (!empty($data['cafe_address'])) ? $data['cafe_address'] : null;
        $this->cafe_site = (!empty($data['cafe_site'])) ? $data['cafe_site'] : null;
        $this->cafe_longitude = (!empty($data['cafe_longitude'])) ? $data['cafe_longitude'] : null;
        $this->cafe_latitude = (!empty($data['cafe_latitude'])) ? $data['cafe_latitude'] : null;
        $this->cafe_vk = (!empty($data['cafe_vk'])) ? $data['cafe_vk'] : null;
        $this->cafe_facebook = (!empty($data['cafe_facebook'])) ? $data['cafe_facebook'] : null;
        $this->cafe_foursquare = (!empty($data['cafe_foursquare'])) ? $data['cafe_foursquare'] : null;
        $this->cafe_google_plus = (!empty($data['cafe_google_plus'])) ? $data['cafe_google_plus'] : null;

        $this->cafe_wifi = (!empty($data['cafe_wifi'])) ? $data['cafe_wifi'] : null;
        $this->cafe_parking = (!empty($data['cafe_parking'])) ? $data['cafe_parking'] : null;
    }
    public function getArrayCopy(){
        return get_object_vars($this);
    }
    public  function getInputFilter(){
        if($this->inputFilter){
            $inputFilter = new InputFilter();
            $factory     = new InputFactory();
            $inputFilter->add($factory->createInput(array(
                'name'     => 'id',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            )));
            $inputFilter->add($factory->createInput(array(
                'name' => 'cafe_id_name',
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array (
                        'name' => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min' => '1',
                            'max' => '100',
                        ),
                    ),
                ),
            )));
            $inputFilter->add($factory->createInput(array(
                'name' => 'cafe_name',
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array (
                        'name' => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min' => '1',
                            'max' => '100',
                        ),
                    ),
                ),
            )));
            $inputFilter->add($factory->createInput(array(
                'name' => 'restaurant_mode',
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array (
                        'name' => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min' => '1',
                            'max' => '100',
                        ),
                    ),
                ),
            )));
            $inputFilter->add($factory->createInput(array(
                'name' => 'cafe_description',
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array (
                        'name' => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min' => '1',
                            'max' => '100',
                        ),
                    ),
                ),
            )));
//                        $inputFilter->add($factory->createInput(array(
//                                            'name' => 'cafe_thumbnail',
//                                            'filters' => array(
//                                                array('name' => 'StripTags'),
//                                                array('name' => 'StringTrim'),
//                                            ),
//                                            'validators' => array(
//                                                array (
//                                                    'name' => 'Size',
//                                                    'options' => array(
//                                                        'min' => '10kB',
//                                                        'max' => '2MB',
//                                                    ),
//                                                ),
//                                                array (
//                                                    'name' => 'ExcludeExtension',
//                                                    'options' => array(
//                                                       'jpeg,png,jpg,'
//                                                    ),
//                                                ),
//                                                array (
//                                                    'name' => 'MimeType',
//                                                    'options' => array(
//                                                       'image,'
//                                                    ),
//                                                ),
//                                                array (
//                                                    'name' => 'ExcludeMimeType',
//                                                    'options' => array(
//                                                       'image,'
//                                                    ),
//                                                ),
//                                                array (
//                                                    'name' => 'Exists',
//                                                    'options' => array(
//                                                          './public/img/restaurants,'
//                                                     ),
//                                                 ),
//                                        ),
//                        )));
            $inputFilter->add($factory->createInput(array(
                'name' => 'cafe_thumbnail',
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array (
                        'name' => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min' => '1',
                            'max' => '100',
                        ),
                    ),
                ),
            )));
            $inputFilter->add($factory->createInput(array(
                'name' => 'cafe_images',
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array (
                        'name' => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min' => '1',
                            'max' => '100',
                        ),
                    ),
                ),
            )));
            $inputFilter->add($factory->createInput(array(
                'name' => 'cafe_average_account',
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array (
                        'name' => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min' => '1',
                            'max' => '100',
                        ),
                    ),
                ),
            )));
            $inputFilter->add($factory->createInput(array(
                'name' => 'cafe_directions',
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                ),
            )));

            $inputFilter->add($factory->createInput(array(
                'name' => 'cafe_address',
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array (
                        'name' => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min' => '1',
                            'max' => '100',
                        ),
                    ),
                ),
            )));
            $inputFilter->add($factory->createInput(array(
                'name' => 'cafe_site',
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array (
                        'name' => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min' => '1',
                            'max' => '100',
                        ),
                    ),
                ),
            )));
            $inputFilter->add($factory->createInput(array(
                'name' => 'cafe_longitude',
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array (
                        'name' => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min' => '1',
                            'max' => '100',
                        ),
                    ),
                    array (
                        'name' => 'float',
                    ),

                ),
            )));
            $inputFilter->add($factory->createInput(array(
                'name' => 'cafe_latitude',
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array (
                        'name' => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min' => '1',
                            'max' => '100',
                        ),
                    ),
                    array (
                        'name' => 'float',
                    ),

                ),
            )));
            $inputFilter->add($factory->createInput(array(
                'name' => 'cafe_vk',
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array (
                        'name' => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min' => '1',
                            'max' => '100',
                        ),
                    ),


                ),
            )));
            $inputFilter->add($factory->createInput(array(
                'name' => 'cafe_facebook',
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array (
                        'name' => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min' => '1',
                            'max' => '100',
                        ),
                    ),


                ),
            )));
            $inputFilter->add($factory->createInput(array(
                'name' => 'cafe_foursquare',
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array (
                        'name' => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min' => '1',
                            'max' => '100',
                        ),
                    ),
                ),
            )));
            $inputFilter->add($factory->createInput(array(
                'name' => 'cafe_google_plus',
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array (
                        'name' => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min' => '1',
                            'max' => '100',
                        ),
                    ),
                ),
            )));
            $inputFilter->add($factory->createInput(array(
                'name'     => 'cafe_wifi',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            )));
            $inputFilter->add($factory->createInput(array(
                'name'     => 'cafe_parking',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            )));

        }
        return $this->inputFilter;
    }
}