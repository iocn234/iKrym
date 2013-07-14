<?php
        namespace Restaurant\Form;

        use Zend\Captcha;
        use Zend\Form\Element;
        use Zend\Form\Form;

        class RestaurantForm extends Form
        {

            public function __construct($name = null)
            {
                parent::__construct('restaurant');

                $this->setAttribute('method', 'post');

                $this->add(array(
                    'name' => 'id',
                    'type' => 'Zend\Form\Element\Hidden',

                ));

                $this->add(array(
                    'name' => 'restaurant_id_name',
                    'type' => 'Zend\Form\Element\Text',
                    'attributes' => array(
                        'id' => 'restaurant_id_name',
                        'placeholder' => 'Название ресторана',
                        'required' => 'required',
                    ),
                    'options' => array(
                        'label' => 'Введите название ресторана для маршрутизации(Напр:для кафе "Апельсин" введите apelsin)(Текстовые данные)',
                    ),
                ));

                $this->add(array(
                    'name' => 'restaurant_name',
                    'type' => 'Zend\Form\Element\Text',
                    'attributes' => array(
                        'id' => 'restaurant_name',
                        'placeholder' => 'Название ресторана',
                        'required' => 'required',
                    ),
                    'options' => array(
                        'label' => 'Введите название ресторана(Текстовые данные)',
                    ),
                ));

                $this->add(array(
                    'name' => 'restaurant_mode',
                    'type' => 'Zend\Form\Element\Text',
                    'attributes' => array(
                        'id' => 'restaurant_mode',
                        'placeholder' => 'Тип ресторана',
                        'required' => 'required',
                    ),
                    'options' => array(
                        'label' => 'Введите тип ресторана(Напр: ресторан - кондитерская)(Текстовые данные)',
                    ),
                ));
//
                $this->add(array(
                    'name' => 'restaurant_description',
                    'type' => 'Zend\Form\Element\Textarea',
                    'attributes' => array(
                        'id' => 'restaurant_description',
                        'required' => 'required',
                    ),
                    'options' => array(
                        'label' => 'Введите описание ресторана(Текстовые данные)',
                    ),
                ));
//
//
//                // File Input
                $file = new Element\File('restaurant_thumbnail');
                $file->setLabel('Загрузите главный рисунок ресторана')
                     ->setAttribute('id', 'image-file');
                $this->add($file);

                $this->add(array(
                    'name' => 'restaurant_images',
                    'type' => 'Zend\Form\Element\Text',
                    'attributes' => array(
                        'id' => 'restaurant_average_account',
                        'placeholder' => 'Средняя стоимость услуг ресторана',
                        'required' => 'required',
                    ),
                    'options' => array(
                        'label' => 'Укажите рисунки ресторана(Текстовые данные-Дорабатывается)',
                    ),
                ));
//
//
                $this->add(array(
                    'name' => 'restaurant_average_account',
                    'type' => 'Zend\Form\Element\Text',
                    'attributes' => array(
                        'id' => 'restaurant_average_account',
                        'placeholder' => 'Средняя стоимость услуг ресторана',
                        'required' => 'required',
                    ),
                    'options' => array(
                        'label' => 'Укажите среднюю стоимость услуг ресторана(Текстовые данные)',
                    ),
                ));
//
                $this->add(array(
                    'name' => 'restaurant_directions',
                    'type' => 'Zend\Form\Element\MultiCheckbox',

                    'options' => array(
                        'label' => 'Введите кухни для ресторана',
                        'label_attributes' => array(
                            'id' => 'direction',
                        ),
                        'setRegisterInArrayValidator' => false,
                        'value_options' => array(
                            'Украинская' => 'Украинская',
                            'Русская' => 'Русская',
                            'Европейская' => 'Европейская',
                            'Японская' => 'Японская',
                        ),
                    ),
                    //http://zend-framework-community.634137.n4.nabble.com/The-input-was-not-found-in-the-haystack-td4657596.html
                    'attributes' => array(
                        'inarrayvalidator' => false,
                    ),
                ));
                $this->add(array(
                    'name' => 'restaurant_work_time',
                    'type' => 'Zend\Form\Element\Text',
                    'attributes' => array(
                        'id' => 'restaurant_work_time',
                        'placeholder' => 'Время работы ресторана?',
                        'required' => 'required',
                    ),
                    'options' => array(
                        'label' => 'Укажите время работы ресторана(Текстовые данные)',
                    ),
                ));
                $this->add(array(
                    'name' => 'restaurant_telephone',
                    'type' => 'Zend\Form\Element\Text',
                    'attributes' => array(
                        'id' => 'restaurant_telephone',
                        'placeholder' => 'Телефон ресторана?',
                        'required' => 'required',
                    ),
                    'options' => array(
                        'label' => 'Введите номер телефона ресторана',
                    ),
                ));
                $this->add(array(
                    'name' => 'restaurant_address',
                    'type' => 'Zend\Form\Element\Text',
                    'attributes' => array(
                        'id' => 'address',
                        'placeholder' => 'Адрес ресторана',
                        'required' => 'required',
                    ),
                    'options' => array(
                        'label' => 'Введите адрес ресторана(Текстовые данные)',
                    ),
                ));
                $this->add(array(
                    'name' => 'restaurant_site',
                    'type' => 'Zend\Form\Element\Text',
                    'attributes' => array(
                        'id' => 'restaurant_site',
                        'placeholder' => 'Адрес сайта',
                        'required' => 'required',
                    ),
                    'options' => array(
                        'label' => 'Введите адрес сайта(Текстовые данные)',
                    ),
                ));
                $this->add(array(
                    'name' => 'restaurant_longitude',
                    'type' => 'Zend\Form\Element\Text',
                    'attributes' => array(
                        'id' => 'restaurant_longitude',
                        'placeholder' => 'Координаты ресторана:долгота',
                        'required' => 'required',
                    ),
                    'options' => array(
                        'label' => 'Введите координаты  ресторана Долгота (Текстовые данные).Например:34.164321',
                    ),
                ));
                $this->add(array(
                    'name' => 'restaurant_latitude',
                    'type' => 'Zend\Form\Element\Text',
                    'attributes' => array(
                        'id' => 'restaurant_latitude',
                        'placeholder' => 'Координаты ресторана:ширина',
                        'required' => 'required',
                    ),
                    'options' => array(
                        'label' => 'Введите координаты ресторана:Широта(Текстовые данные).Например:44.490152',
                    ),
                ));
//                $this->add(array(
//                    'name' => 'restaurant_vk',
//                    'type' => 'Zend\Form\Element\Text',
//                    'attributes' => array(
//                        'id' => 'restaurant_vk',
//                        'placeholder' => 'Введите сайт ресторана в соц.сети VK',
//                        'required' => 'required',
//                    ),
//                    'options' => array(
//                        'label' => 'Введите сайт ресторана в соц.сети VK(Текстовые данные)',
//                    ),
//                ));
//                $this->add(array(
//                    'name' => 'restaurant_facebook',
//                    'type' => 'Zend\Form\Element\Text',
//                    'attributes' => array(
//                        'id' => 'restaurant_facebook',
//                        'placeholder' => 'Введите сайт ресторана в соц.сети Facebook',
//                        'required' => 'required',
//                    ),
//                    'options' => array(
//                        'label' => 'Введите сайт ресторана в соц.сети Facebook(Текстовые данные)',
//                    ),
//                ));
//                $this->add(array(
//                'name' => 'restaurant_foursquare',
//                'type' => 'Zend\Form\Element\Text',
//                'attributes' => array(
//                    'id' => 'restaurant_foursquare',
//                    'placeholder' => 'Введите сайт ресторана в соц.сети Foursquare',
//                    'required' => 'required',
//                ),
//                'options' => array(
//                    'label' => 'Введите сайт ресторана в соц.сети Foursquare(Текстовые данные)',
//                ),
//            ));
//                $this->add(array(
//                'name' => 'restaurant_wifi',
//                'type' => 'Zend\Form\Element\Select',
//                    'options' => array(
//                        'label' => 'Поддеживает ли ваш сайт возможность Wi-fi',
//                        'value_options' => array(
//                            '0' => 'Нет',
//                            '1' => 'Да',
//
//                        ),
//                    ),
//            ));
//                $this->add(array(
//                'name' => 'restaurant_parking',
//                'type' => 'Zend\Form\Element\Select',
//                'options' => array(
//                    'label' => 'Поддеживает ли ваш сайт возможность паркинга',
//                    'value_options' => array(
//                        '0' => 'Нет',
//                        '1' => 'Да',
//
//                    ),
//                ),
//            ));

                $this->add(array(
                    'name' => 'submit',
                    'type' => 'Zend\Form\Element\Submit',

                    'attributes' => array(
                        'value' => 'Go',
                        'id' => 'submitbutton',
                    ),
                ));


            }
        }