<?php
    namespace ZfcAdmin\Form;

    use Zend\InputFilter;
    use Zend\Form\Form;
    use Zend\Form\Element;

    class SingleUpload extends Form{
                public  function __construct($name = null,$options = array()){
                    parent::__construct($name,$options);
                    $this->addElements();
                    $this->setInputFilter($this->createInputFilter());
                }
                public  function addElements(){
                    //file input
                    $file = new Element\File('file');
                    $file->setLabel('File Input')
                         ->setAttributes(array('id' => 'file'));
                    $this->add($file);

                    //text input
                    $text = new Element\Text('text');
                    $text->setLabel('Text Entry');
                    $this->add($text);
                }
                public  function createInputFilter(){
                    $inputFilter = new InputFilter\InputFilter();

                    //file input
                    $file = new InputFilter\FileInput('file');
                    $file->setRequired(true);
                    $file->getFilterChain()->attachByName(
                        'filerenameupload',
                        array(
                            'target' => './data/tmpuploads',
                            'overwrite' => true,
                            'use_upload_name' => true,
                        )
                    );
                    $inputFilter->add($file);
                    $text = new InputFilter\Input('text');
                    $text->setRequired(true);
                    $inputFilter->add($text);
                    return $inputFilter;
                }
    }
