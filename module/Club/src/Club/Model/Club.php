<?php
namespace Club\Model;
use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;

class Club{

    public $club_id;
    public $club_id_name;
    public $club_name;
    public $club_description;
    public $club_thumbnail;
    public $club_images;
    public $club_average_account;
    public $club_directions;
    public $club_work_time;
    public $club_telephone;
    public $club_address;
    public $club_site;

    public $club_longitude;
    public $club_latitude;

    public $club_vk;
    public $club_facebook;
    public $club_foursquare;
    public $club_google_plus;

    public $club_wifi;
    public $club_parking;

    protected $inputFilter;

    public  function exchangeArray($data){
        $this->club_id  = (!empty($data['club_id'])) ? $data['club_id'] : null;
        $this->club_id_name  = (!empty($data['club_id_name'])) ? $data['club_id_name'] : null;
        $this->club_name = (!empty($data['club_name'])) ? $data['club_name'] : null;
       // $this->restaurant_mode = (!empty($data['restaurant_mode'])) ? $data['restaurant_mode'] : null;
        $this->club_description = (!empty($data['club_description'])) ? $data['club_description'] : null;
        $this->club_thumbnail = (!empty($data['club_thumbnail'])) ? $data['club_thumbnail'] : null;
        $this->club_images = (!empty($data['club_images'])) ? $data['club_images'] : null;
        $this->club_average_account = (!empty($data['club_average_account'])) ? $data['club_average_account'] : null;
        $this->club_directions = (!empty($data['club_directions'])) ? $data['club_directions'] : null;
        $this->club_work_time = (!empty($data['club_work_time'])) ? $data['club_work_time'] : null;
        $this->club_telephone = (!empty($data['club_telephone'])) ? $data['club_telephone'] : null;
        $this->club_address = (!empty($data['club_address'])) ? $data['club_address'] : null;
        $this->club_site = (!empty($data['club_site'])) ? $data['club_site'] : null;
        $this->club_longitude = (!empty($data['club_longitude'])) ? $data['club_longitude'] : null;
        $this->club_latitude = (!empty($data['club_latitude'])) ? $data['club_latitude'] : null;
        $this->club_vk = (!empty($data['club_vk'])) ? $data['club_vk'] : null;
        $this->club_facebook = (!empty($data['club_facebook'])) ? $data['club_facebook'] : null;
        $this->club_foursquare = (!empty($data['club_foursquare'])) ? $data['club_foursquare'] : null;
        $this->club_google_plus = (!empty($data['club_google_plus'])) ? $data['club_google_plus'] : null;

        $this->club_wifi = (!empty($data['club_wifi'])) ? $data['club_wifi'] : null;
        $this->club_parking = (!empty($data['club_parking'])) ? $data['club_parking'] : null;
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
                'name' => 'club_id_name',
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
                'name' => 'club_name',
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
                'name' => 'club_description',
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
//                                            'name' => 'club_thumbnail',
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
                'name' => 'club_thumbnail',
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
                'name' => 'club_images',
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
                'name' => 'club_average_account',
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
                'name' => 'club_directions',
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                ),
            )));

            $inputFilter->add($factory->createInput(array(
                'name' => 'club_address',
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
                'name' => 'club_site',
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
                'name' => 'club_longitude',
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
                'name' => 'club_latitude',
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
                'name' => 'club_vk',
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
                'name' => 'club_facebook',
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
                'name' => 'club_foursquare',
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
                'name' => 'club_google_plus',
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
                'name'     => 'club_wifi',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            )));
            $inputFilter->add($factory->createInput(array(
                'name'     => 'club_parking',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            )));

        }
        return $this->inputFilter;
    }
}