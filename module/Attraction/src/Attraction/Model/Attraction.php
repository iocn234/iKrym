<?php
    namespace Attraction\Model;
    use Zend\InputFilter\Factory as InputFactory;
    use Zend\InputFilter\InputFilter;
    use Zend\InputFilter\InputFilterAwareInterface;
    use Zend\InputFilter\InputFilterInterface;

    class Attraction{
        public $attraction_id;
        public $attraction_id_name;
        public $attraction_name;
        public $attraction_type;
        public $attraction_time_work;
        public $attraction_ticket_price;
        public $attraction_telephone;
        public $attraction_address;
        public $attraction_description;
        public $attraction_site;
        public $attraction_longitude;
        public $attraction_latitude;
        public $attraction_foursquare;


        public $attraction_main_photo;
        public $attraction_additional_photos;
        public $attraction_vk;
        public $attraction_facebook;

        protected $input_filter;

        public  function exchangeArray($data){
            $this->attraction_id  = (!empty($data['attraction_id'])) ? $data['attraction_id'] : null;
            $this->attraction_id_name  = (!empty($data['attraction_id_name'])) ? $data['attraction_id_name'] : null;
            $this->attraction_name  = (!empty($data['attraction_name'])) ? $data['attraction_name'] : null;
            $this->attraction_type  = (!empty($data['attraction_type'])) ? $data['attraction_type'] : null;
            $this->attraction_time_work  = (!empty($data['attraction_time_work'])) ? $data['attraction_time_work'] : null;
            $this->attraction_ticket_price  = (!empty($data['attraction_ticket_price'])) ? $data['attraction_ticket_price'] : null;
            $this->attraction_telephone  = (!empty($data['attraction_telephone'])) ? $data['attraction_telephone'] : null;
            $this->attraction_address  = (!empty($data['attraction_address'])) ? $data['attraction_address'] : null;
            $this->attraction_description  = (!empty($data['attraction_description'])) ? $data['attraction_description'] : null;
            $this->attraction_site = (!empty($data['attraction_site'])) ? $data['attraction_site'] : null;
            $this->attraction_longitude  = (!empty($data['attraction_longitude'])) ? $data['attraction_longitude'] : null;
            $this->attraction_latitude = (!empty($data['attraction_latitude'])) ? $data['attraction_latitude'] : null;
            $this->attraction_foursquare  = (!empty($data['attraction_foursquare'])) ? $data['attraction_foursquare'] : null;
            $this->attraction_main_photo = (!empty($data['attraction_main_photo'])) ? $data['attraction_main_photo'] : null;
            $this->attraction_additional_photos = (!empty($data['attraction_additional_photos'])) ? $data['attraction_additional_photos'] : null;
            $this->attraction_vk  = (!empty($data['attraction_vk'])) ? $data['attraction_vk'] : null;
            $this->attraction_facebook  = (!empty($data['attraction_facebook'])) ? $data['attraction_facebook'] : null;
        }
        public  function getArrayCopy(){
            //Gets the properties of the given object
            return get_object_vars($this);
        }
        public  function getInputFilter(){
            if($this->input_filter){
                    $inputFilter = new InputFilter();
                    $factory     = new InputFactory();
                    $inputFilter->add($factory->createInput(array(
                        'name'     => 'attraction_id',
                        'required' => true,
                        'filters'  => array(
                            array('name' => 'Int'),
                        ),
                    )));
                    $inputFilter->add($factory->createInput(array(
                        'name'     => 'attraction_id_name',
                        'required' => true,
                        'filters'  => array(
                            array('name' => 'StripTags'),
                            array('name' => 'StringTrim'),
                        ),
                        'validators' => array(
                            array(
                                'name'    => 'StringLength',
                                'options' => array(
                                    'encoding' => 'UTF-8',
                                    'min'      => 1,
                                    'max'      => 100,
                                ),
                            ),
                        ),
                    )));
                    $inputFilter->add($factory->createInput(array(
                        'name'     => 'attraction_name',
                        'required' => true,
                        'filters'  => array(
                            array('name' => 'StripTags'),
                            array('name' => 'StringTrim'),
                        ),
                        'validators' => array(
                            array(
                                'name'    => 'StringLength',
                                'options' => array(
                                    'encoding' => 'UTF-8',
                                    'min'      => 1,
                                    'max'      => 100,
                                ),
                            ),
                        ),
                    )));
                    $inputFilter->add($factory->createInput(array(
                        'name'     => 'attraction_time_work',
                        'required' => true,
                        'filters'  => array(
                            array('name' => 'StripTags'),
                            array('name' => 'StringTrim'),
                        ),
                        'validators' => array(
                            array(
                                'name'    => 'StringLength',
                                'options' => array(
                                    'encoding' => 'UTF-8',
                                    'min'      => 1,
                                    'max'      => 100,
                                ),
                            ),
                        ),
                    )));
                    $inputFilter->add($factory->createInput(array(
                        'name'     => 'attraction_ticket_price',
                        'required' => true,
                        'filters'  => array(
                            array('name' => 'StripTags'),
                            array('name' => 'StringTrim'),
                        ),
                        'validators' => array(
                            array(
                                'name'    => 'StringLength',
                                'options' => array(
                                    'encoding' => 'UTF-8',
                                    'min'      => 1,
                                    'max'      => 100,
                                ),
                            ),
                        ),
                    )));
                    $inputFilter->add($factory->createInput(array(
                        'name'     => 'attraction_telephone',
                        'required' => true,
                        'filters'  => array(
                            array('name' => 'StripTags'),
                            array('name' => 'StringTrim'),
                        ),
                        'validators' => array(
                            array(
                                'name'    => 'StringLength',
                                'options' => array(
                                    'encoding' => 'UTF-8',
                                    'min'      => 1,
                                    'max'      => 100,
                                ),
                            ),
                        ),
                    )));
                    $inputFilter->add($factory->createInput(array(
                        'name'     => 'attraction_address',
                        'required' => true,
                        'filters'  => array(
                            array('name' => 'StripTags'),
                            array('name' => 'StringTrim'),
                        ),
                        'validators' => array(
                            array(
                                'name'    => 'StringLength',
                                'options' => array(
                                    'encoding' => 'UTF-8',
                                    'min'      => 1,
                                    'max'      => 100,
                                ),
                            ),
                        ),
                    )));
                    $inputFilter->add($factory->createInput(array(
                        'name'     => 'attraction_description',
                        'required' => true,
                        'filters'  => array(
                            array('name' => 'StripTags'),
                            array('name' => 'StringTrim'),
                        ),
                        'validators' => array(
                            array(
                                'name'    => 'StringLength',
                                'options' => array(
                                    'encoding' => 'UTF-8',
                                    'min'      => 1,
                                    'max'      => 100,
                                ),
                            ),
                        ),
                    )));
                    $inputFilter->add($factory->createInput(array(
                        'name'     => 'attraction_site',
                        'required' => true,
                        'filters'  => array(
                            array('name' => 'StripTags'),
                            array('name' => 'StringTrim'),
                        ),
                        'validators' => array(
                            array(
                                'name'    => 'StringLength',
                                'options' => array(
                                    'encoding' => 'UTF-8',
                                    'min'      => 1,
                                    'max'      => 100,
                                ),
                            ),
                        ),
                    )));
                    $inputFilter->add($factory->createInput(array(
                        'name'     => 'attraction_longitude',
                        'required' => true,
                        'filters'  => array(
                            array('name' => 'Float'),
                        ),
                    )));
                    $inputFilter->add($factory->createInput(array(
                        'name'     => 'attraction_latitude',
                        'required' => true,
                        'filters'  => array(
                            array('name' => 'Float'),
                        ),
                    )));
                    $inputFilter->add($factory->createInput(array(
                        'name'     => 'attraction_foursquare',
                        'required' => true,
                        'filters'  => array(
                            array('name' => 'StripTags'),
                            array('name' => 'StringTrim'),
                        ),
                        'validators' => array(
                            array(
                                'name'    => 'StringLength',
                                'options' => array(
                                    'encoding' => 'UTF-8',
                                    'min'      => 1,
                                    'max'      => 100,
                                ),
                            ),
                        ),
                    )));
                    $inputFilter->add($factory->createInput(array(
                    'name'     => 'attraction_main_photo',
                    'required' => true,
                    'filters'  => array(
                        array('name' => 'StripTags'),
                        array('name' => 'StringTrim'),
                    ),
                    'validators' => array(
                        array(
                            'name'    => 'StringLength',
                            'options' => array(
                                'encoding' => 'UTF-8',
                                'min'      => 1,
                                'max'      => 100,
                            ),
                        ),
                    ),
                )));
                    $inputFilter->add($factory->createInput(array(
                        'name'     => 'attraction_vk',
                        'required' => true,
                        'filters'  => array(
                            array('name' => 'StripTags'),
                            array('name' => 'StringTrim'),
                        ),
                        'validators' => array(
                            array(
                                'name'    => 'StringLength',
                                'options' => array(
                                    'encoding' => 'UTF-8',
                                    'min'      => 1,
                                    'max'      => 100,
                                ),
                            ),
                        ),
            )));
                    $inputFilter->add($factory->createInput(array(
                    'name'     => 'attraction_facebook',
                    'required' => true,
                    'filters'  => array(
                        array('name' => 'StripTags'),
                        array('name' => 'StringTrim'),
                    ),
                    'validators' => array(
                        array(
                            'name'    => 'StringLength',
                            'options' => array(
                                'encoding' => 'UTF-8',
                                'min'      => 1,
                                'max'      => 100,
                            ),
                        ),
                    ),
                )));
        }
            return $this->input_filter;
        }
    }