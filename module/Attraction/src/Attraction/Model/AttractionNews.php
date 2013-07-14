<?php
    namespace Attraction\Model;
    use Zend\Db\TableGateway\TableGateway;
    use Zend\InputFilter\InputFilter;
    use Zend\InputFilter\Factory as InputFactory;


    class AttractionNews{
            public $attraction_news_id;
            public $attraction_id;
            public $attraction_id_name;
            public $attraction_news_news;
            public $attraction_news_date;
            public $input_filter;

        public  function exchangeArray($data){
            $this->attraction_news_id  = (!empty($data['attraction_news_id'])) ? $data['attraction_news_id'] : null;
            $this->attraction_id  = (!empty($data['attraction_id'])) ? $data['attraction_id'] : null;
            $this->attraction_id_name  = (!empty($data['attraction_id_name'])) ? $data['attraction_id_name'] : null;
            $this->attraction_news_news  = (!empty($data['attraction_news_news'])) ? $data['attraction_news_news'] : null;
            $this->attraction_news_date  = (!empty($data['attraction_news_date'])) ? $data['attraction_news_date'] : null;

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
                    'name'     => 'attraction_news_id',
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
                    'name'     => 'attraction_news_news',
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
                    'name'     => 'attraction_news_date',
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