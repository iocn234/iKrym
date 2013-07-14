<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Cafe' => 'Cafe\Controller\CafeController',

        ),
    ),
    // The following section is new and should be added to your file
    'router' => array(
        'routes' => array(
            'cafes' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/cafes[/][:action][/:cafe_id_name]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'cafe_id_name' => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ),
                    'defaults' => array(
                        'controller' => 'Cafe',
                        'action'     => 'index',
                    ),
                ),
            ),
            'cafe' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/cafe[/:cafe_id_name]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'cafe_id_name'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ),
                    'defaults' => array(
                        'controller' => 'Cafe',
                        'action'     => 'cafe',
                    ),
                ),
            ),

        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'cafe' => __DIR__ . '/../view',
        ),
    ),
);