<?php
        namespace Restaurant\Model;
        use Zend\InputFilter\Factory as InputFactory;
        use Zend\InputFilter\InputFilterInterface;
        use Zend\InputFilter\InputFilter;
        use Zend\InputFilter\FileInput;

        class Restaurant{

            public  $id;
            public $restaurant_id_name;
            public $restaurant_name;
            public $restaurant_mode;
            public $restaurant_description;
            public $restaurant_thumbnail;
            public $restaurant_images;
            public $restaurant_average_account;
            public $restaurant_directions;
            public $restaurant_work_time;
            public $restaurant_telephone;
            public $restaurant_address;
            public $restaurant_site;
//
            public $restaurant_longitude;
            public $restaurant_latitude;
//
     //       public $restaurant_vk;
      //      public $restaurant_facebook;
       //     public $restaurant_foursquare;
//
       //      public $restaurant_wifi;
        //     public $restaurant_parking;

            protected $inputFilter;

            public  function exchangeArray($data){
                       $this->id  = (!empty($data['id'])) ? $data['id'] : null;
                       //берем значение
                       //$data['restaurant_thumbnail'] = $data['restaurant_thumbnail']['tmp_name'];

                       $this->restaurant_id_name  = (!empty($data['restaurant_id_name'])) ? $data['restaurant_id_name'] : null;
                       $this->restaurant_name = (!empty($data['restaurant_name'])) ? $data['restaurant_name'] : null;
                       $this->restaurant_mode = (!empty($data['restaurant_mode'])) ? $data['restaurant_mode'] : null;
                       $this->restaurant_description = (!empty($data['restaurant_description'])) ? $data['restaurant_description'] : null;

             if (!is_null($data['restaurant_thumbnail']['tmp_name']))
                {
                    $this->restaurant_thumbnail = $data['restaurant_thumbnail']['tmp_name'];
                    $data['restaurant_thumbnail']['tmp_name'] = null;

                }
             if (isset($data['restaurant_thumbnail']['tmp_name'])){
                        $this->restaurant_thumbnail = $data['restaurant_thumbnail'];
                        $data['restaurant_thumbnail']['tmp_name'] = null;

            }

                       $this->restaurant_images = (!empty($data['restaurant_images'])) ? $data['restaurant_images'] : null;
                       $this->restaurant_average_account = (!empty($data['restaurant_average_account'])) ? $data['restaurant_average_account'] : null;
                       $this->restaurant_directions = (!empty($data['restaurant_directions'])) ?  $data['restaurant_directions'] = implode(" ",array($data['restaurant_directions'][0],$data['restaurant_directions'][1],$data['restaurant_directions'][2],$data['restaurant_directions'][3]))  : null;
                       $this->restaurant_work_time = (!empty($data['restaurant_work_time'])) ? $data['restaurant_work_time'] : null;
                       $this->restaurant_telephone = (!empty($data['restaurant_telephone'])) ? $data['restaurant_telephone'] : null;
                       $this->restaurant_address = (!empty($data['restaurant_address'])) ? $data['restaurant_address'] : null;
                       $this->restaurant_site = (!empty($data['restaurant_site'])) ? $data['restaurant_site'] : null;
                       $this->restaurant_longitude = (!empty($data['restaurant_longitude'])) ? $data['restaurant_longitude'] : null;
                       $this->restaurant_latitude = (!empty($data['restaurant_latitude'])) ? $data['restaurant_latitude'] : null;
                    //   $this->restaurant_vk = (!empty($data['restaurant_vk'])) ? $data['restaurant_vk'] : null;
                    //   $this->restaurant_facebook = (!empty($data['restaurant_facebook'])) ? $data['restaurant_facebook'] : null;
                   //    $this->restaurant_foursquare = (!empty($data['restaurant_foursquare'])) ? $data['restaurant_foursquare'] : null;

                   //    $this->restaurant_wifi = (!empty($data['restaurant_wifi'])) ? $data['restaurant_wifi'] : null;
                   //    $this->restaurant_parking = (!empty($data['restaurant_parking'])) ? $data['restaurant_parking'] : null;
            }
            public function exchangeImage($data){
                //запись значения

            }


            public function getArrayCopy(){
                return get_object_vars($this);
            }
            public  function getInputFilter(){
                    if(!$this->inputFilter){
                        $inputFilter = new InputFilter();
                        $factory     = new InputFactory();

                        //id
                        $inputFilter->add($factory->createInput(array(
                            'name'     => 'id',
                            'required' => true,
                            'filters'  => array(
                                array('name' => 'Int'),
                            ),
                        )));
                        //restaurant_id_name
                        $inputFilter->add($factory->createInput(array(
                            'name' => 'restaurant_id_name',
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
                        //restaurant_name
                        $inputFilter->add($factory->createInput(array(
                            'name' => 'restaurant_name',
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
//                        //restaurant_mode
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
                        //restaurant_description
                        $inputFilter->add($factory->createInput(array(
                            'name' => 'restaurant_description',
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
                                        'max' => '1000',
                                    ),
                                ),
                            ),
                        )));
                        //restaurant_thumbnail

                        #version1
//                        $inputFilter->add($factory->createInput(array(
//                                            'name' => 'restaurant_thumbnail',
//                                            'required' => true,
//                                            'target' => './data/tmpuploads/',
//                                            'overwrite'       => true,
//                                            'use_upload_name' => true,
////                                            'filters' => array(
////                                                array('name' => 'StripTags'),
////                                                array('name' => 'StringTrim'),
////                                            ),
//                                            'validators' => array(
//                                                array (
//                                                    'name' => 'Zend\Validator\File\Size',
//                                                    'options' => array(
//                                                        'min' => '1kB',
//                                                        'max' => '2MB',
//                                                    ),
//                                                ),
//                                                array (
//                                                    'name' => 'Zend\Validator\File\ExcludeExtension',
//                                                    'options' => array(
//                                                       '.jpeg,.png,.jpg'
//                                                    ),
//                                                ),
//
//                                        ),
//                        )));

                        #version2
                      //  $inputFilter = new InputFilter();

                        // File Input
                        //https://github.com/cgmartin/ZF2FileUploadExamples/blob/master/src/ZF2FileUploadExamples/Form/SingleUpload.php
                        $file = new FileInput('restaurant_thumbnail');

                        $file->setRequired(true);
                        $file->getFilterChain()->attachByName(
                            'filerenameupload',
                            array(
                                'target'          => './public/img/restaurants/*',
                                'overwrite'       => true,
                                'use_upload_name' => true,
                            )
                        );
                        $inputFilter->add($file);


//                        //restaurant_images
                        $inputFilter->add($factory->createInput(array(
                            'name' => 'restaurant_images',
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
//                        //restaurant_average_account
                        $inputFilter->add($factory->createInput(array(
                            'name' => 'restaurant_average_account',
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
                        //restaurant_directions
                        $inputFilter->add($factory->createInput(array(
                            'name' => 'restaurant_directions',
                            'disable_inarray_validator' => false
                        )));
                        //restaurant_work_time
                        $inputFilter->add($factory->createInput(array(
                            'name' => 'restaurant_work_time',
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
                        ////                        //restaurant_telephone
                        $inputFilter->add($factory->createInput(array(
                            'name' => 'restaurant_telephone',
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


//                        //restaurant_address
                        $inputFilter->add($factory->createInput(array(
                            'name' => 'restaurant_address',
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

////                        //restaurant_site
                        $inputFilter->add($factory->createInput(array(
                            'name' => 'restaurant_site',
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
////                        //restaurant_longitude
                        $inputFilter->add($factory->createInput(array(
                            'name' => 'restaurant_longitude',
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
//                                array(
//                                    'name' => 'Zend\I18n\Validator\Float',
//                                ),


                            ),
                        )));
////                        //restaurant_latitude
                        $inputFilter->add($factory->createInput(array(
                            'name' => 'restaurant_latitude',
                            'required' => true,
                            'filters' => array(
                                array('name' => 'StripTags'),
                                array('name' => 'StringTrim'),
                            ),
                            'validators' => array(

//                                array(
//                                    'name' => 'Zend\I18n\Validator\Float',
//                                ),


                            ),
                        )));
////                        //restaurant_vk
//                        $inputFilter->add($factory->createInput(array(
//                            'name' => 'restaurant_vk',
//                            'required' => true,
//                            'filters' => array(
//                                array('name' => 'StripTags'),
//                                array('name' => 'StringTrim'),
//                            ),
//                            'validators' => array(
//                                array (
//                                    'name' => 'StringLength',
//                                    'options' => array(
//                                        'encoding' => 'UTF-8',
//                                        'min' => '1',
//                                        'max' => '100',
//                                    ),
//                                ),
//
//
//                            ),
//                        )));
////                        //restaurant_facebook
//                        $inputFilter->add($factory->createInput(array(
//                            'name' => 'restaurant_facebook',
//                            'required' => true,
//                            'filters' => array(
//                                array('name' => 'StripTags'),
//                                array('name' => 'StringTrim'),
//                            ),
//                            'validators' => array(
//                                array (
//                                    'name' => 'StringLength',
//                                    'options' => array(
//                                        'encoding' => 'UTF-8',
//                                        'min' => '1',
//                                        'max' => '100',
//                                    ),
//                                ),
//
//
//                            ),
//                        )));
////                        //restaurant_foursquare
//                        $inputFilter->add($factory->createInput(array(
//                            'name' => 'restaurant_foursquare',
//                            'required' => true,
//                            'filters' => array(
//                                array('name' => 'StripTags'),
//                                array('name' => 'StringTrim'),
//                            ),
//                            'validators' => array(
//                                array (
//                                    'name' => 'StringLength',
//                                    'options' => array(
//                                        'encoding' => 'UTF-8',
//                                        'min' => '1',
//                                        'max' => '100',
//                                    ),
//                                ),
//                            ),
//                        )));
////                        //restaurant_wifi
//                        $inputFilter->add($factory->createInput(array(
//                            'name'     => 'restaurant_wifi',
//                            'required' => true,
//                            'filters'  => array(
//                                array('name' => 'Int'),
//                            ),
//                        )));
//                        //restaurant_parking
//                        $inputFilter->add($factory->createInput(array(
//                            'name'     => 'restaurant_parking',
//                            'required' => true,
//                            'filters'  => array(
//                                array('name' => 'Int'),
//                            ),
//                        )));


                        $this->inputFilter = $inputFilter;

                    }
                    return $this->inputFilter;
            }
        }