<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Hostel' => 'Hostel\Controller\HostelController',

        ),
    ),
    // The following section is new and should be added to your file
    'router' => array(
        'routes' => array(
            'hostels' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/hostels[/][:action][/:hostel_name_route]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'hostel_name_route' => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ),
                    'defaults' => array(
                        'controller' => 'Hostel',
                        'action'     => 'index',
                    ),
                ),
            ),
            'hostel' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/hostel[/:hostel_name_route]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'hostel_id_name'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ),
                    'defaults' => array(
                        'controller' => 'Hostel',
                        'action'     => 'hostel',
                    ),
                ),
            ),
        ),
    ),

    'view_manager' => array(
        'template_path_stack' => array(
            'hostel' => __DIR__ . '/../view',
        ),
    ),
);