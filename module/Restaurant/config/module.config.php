<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Restaurant' => 'Restaurant\Controller\RestaurantController',

        ),
    ),
    // The following section is new and should be added to your file
    'router' => array(
        'routes' => array(
            'restaurants' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/restaurants[/][:action][/:restaurant_id_name]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'restaurant_id_name' => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ),
                    'defaults' => array(
                        'controller' => 'Restaurant',
                        'action'     => 'index',
                    ),
                ),
            ),
            'restaurant' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/restaurant[/:restaurant_id_name]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'restaurant_id_name'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ),
                    'defaults' => array(
                        'controller' => 'Restaurant',
                        'action'     => 'restaurant',
                    ),
                ),
            ),
            'menu' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/restaurant/menu[/:restaurant_id_name]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'restaurant_id_name'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ),
                    'defaults' => array(
                        'controller' => 'Restaurant',
                        'action'     => 'restaurant_menu',
                    ),
                ),
            ),
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'restaurant' => __DIR__ . '/../view',
        ),
    ),
);