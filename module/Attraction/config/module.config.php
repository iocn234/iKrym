<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Attraction' => 'Attraction\Controller\AttractionController',
            'ZfcAdmin\Controller\AdminController' => 'ZfcAdmin\Controller\AdminController',
        ),
    ),
    // The following section is new and should be added to your file
    'router' => array(
        'routes' => array(
            'attractions' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/attractions[/][:action][/:attraction_name]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'attraction_name'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ),
                    'defaults' => array(
                        'controller' => 'Attraction',
                        'action'     => 'index',
                    ),
                ),
            ),
            'attraction' => array(
                     'type' => 'segment',
                     'options' => array(
                           'route' => '/attraction[/:attraction_id_name]',
                    'constraints' => array(
                            'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                            'attraction_id_name' => '[a-zA-Z][a-zA-Z0-9_-]*'

                     ),
                    'defaults' => array(
                        'controller' => 'Attraction',
                        'action' => 'attraction',
                    ),
                    'may_terminate' => true,
                    'child_routes' => array(
                            'poster' => array(
                                'type' => 'segment',
                                'options' => array(
                                    'route' => '/attraction/poster[/:attraction_id_name]'
                                ),
                                'constraints' => array(
                                    'attraction_id_name' => '[a-zA-Z][a-zA-Z0-9_-]*'
                                ),
                                'defaults' => array(
                                    'controller' => 'Attraction',
                                    'action' => 'attraction_poster',
                                ),

                            ),
                    ),
             ),
          ),
            'poster' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/attraction/poster[/:attraction_id_name]',
                    'constraints' => array(
                        'attraction_id_name' => '[a-zA-Z][a-zA-Z0-9_-]*'
                    ),
                    'defaults' => array(
                        'controller' => 'Attraction',
                        'action' => 'attraction_poster',
                    ),
                ),
            ),
            'photoreport' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/attraction/photoreport[/:attraction_id_name]',
                    'constraints' => array(
                        'attraction_id_name' => '[a-zA-Z][a-zA-Z0-9_-]*'
                    ),
                    'defaults' => array(
                        'controller' => 'Attraction',
                        'action' => 'attraction_photoreport',
                    ),
                ),
            ),

        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'attraction' => __DIR__ . '/../view',

        ),
    ),
);