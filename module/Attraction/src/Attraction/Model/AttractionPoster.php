<?php
    namespace Attraction\Model;
    use Zend\InputFilter\Factory as InputFactory;
    use Zend\InputFilter\InputFilter;
    use Zend\InputFilter\InputFilterAwareInterface;
    use Zend\InputFilter\InputFilterInterface;

    class AttractionPoster{
        public $attraction_poster_id;
        public $attraction_id;
        public $attraction_id_name;
        public $attraction_poster_name;
        public $attraction_poster_date;
        public $attraction_poster_description;

        protected $input_filter;

        public  function exchangeArray($data){
            $this->attraction_poster_id  = (!empty($data['attraction_poster_id'])) ? $data['attraction_poster_id'] : null;
            $this->attraction_id  = (!empty($data['attraction_id'])) ? $data['attraction_id'] : null;
            $this->attraction_id_name  = (!empty($data['attraction_id_name'])) ? $data['attraction_id_name'] : null;
            $this->attraction_poster_name  = (!empty($data['attraction_poster_name'])) ? $data['attraction_poster_name'] : null;
            $this->attraction_poster_date  = (!empty($data['attraction_poster_date'])) ? $data['attraction_poster_date'] : null;
            $this->attraction_poster_description  = (!empty($data['attraction_poster_description'])) ? $data['attraction_poster_description'] : null;

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
                    'name'     => 'attraction_poster_id',
                    'required' => true,
                    'filters'  => array(
                        array('name' => 'Int'),
                    ),
                )));
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
                    'name'     => 'attraction_poster_name',
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
                    'name'     => 'attraction_poster_date',
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
                    'name'     => 'attraction_poster_description',
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
        }
    }
