<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Club' => 'Club\Controller\ClubController',

        ),
    ),
    // The following section is new and should be added to your file
    'router' => array(
        'routes' => array(
            'clubs' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/clubs[/][:action][/:club_id_name]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'club_id_name' => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ),
                    'defaults' => array(
                        'controller' => 'Club',
                        'action'     => 'index',
                    ),
                ),
            ),
            'club' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/club[/:club_id_name]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'club_id_name'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ),
                    'defaults' => array(
                        'controller' => 'Club',
                        'action'     => 'club',
                    ),
                ),
            ),

        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'club' => __DIR__ . '/../view',
        ),
    ),
);