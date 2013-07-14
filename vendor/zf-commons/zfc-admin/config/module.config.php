<?php
/**
 * Copyright (c) 2012 Jurian Sluiman.
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions
 * are met:
 *
 *   * Redistributions of source code must retain the above copyright
 *     notice, this list of conditions and the following disclaimer.
 *
 *   * Redistributions in binary form must reproduce the above copyright
 *     notice, this list of conditions and the following disclaimer in
 *     the documentation and/or other materials provided with the
 *     distribution.
 *
 *   * Neither the names of the copyright holders nor the names of the
 *     contributors may be used to endorse or promote products derived
 *     from this software without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS
 * FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
 * COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT,
 * INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING,
 * BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
 * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER
 * CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT
 * LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN
 * ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * @package     ZfcAdmin
 * @subpackage  Controller
 * @author      Jurian Sluiman <jurian@soflomo.com>
 * @copyright   2012 Jurian Sluiman.
 * @license     http://www.opensource.org/licenses/bsd-license.php  BSD License
 * @link        http://zf-commons.github.com
 */

return array(
    'controllers' => array(
        'invokables' => array(
            'ZfcAdmin\Controller\AdminController' => 'ZfcAdmin\Controller\AdminController',

            'Transport' => 'Timetable\Controller\TransportController',
            'Upload' => 'ZfcAdmin\Controller\MyController',
        ),
    ),
    'zfcadmin' => array(
        'use_admin_layout'      => true,
        'admin_layout_template' => 'layout/admin',
    ),

    'navigation' => array(
        'admin' => array(),
    ),

    'router' => array(
        'routes' => array(
            'zfcadmin' => array(
                'type' => 'literal',
                'options' => array(
                    'route'    => '/admin',
                    'defaults' => array(
                        'controller' => 'ZfcAdmin\Controller\AdminController',
                        'action'     => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                 /*-------------------------------------- restaurants route ----------------------------------------*/
                                        'restaurants' => array(
                                                'type'    => 'segment',
                                                'options' => array(
                                                    'route'    => '/restaurants[/][:action]',
                                                    'constraints' => array(
                                                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',

                                                    ),
                                                    'defaults' => array(
                                                        'controller' => 'ZfcAdmin\Controller\AdminController',
                                                        'action'     => 'restaurants',
                                                    ),
                                                ),
                                                'may_terminate' => true,
                                                'child_routes' => array(
                                                   'add' => array(
                                                      'type'    => 'literal',
                                                        'options' => array(
                                                           'route'    => '/add',
                                                          'defaults' => array(
                                                               'controller' => 'ZfcAdmin\Controller\AdminController',
                                                               'action'     => 'restaurants_add',
                                                            ),
                                                       ),
                                                   ),
                                                   'success'=> array(
                                                       'type'    => 'literal',
                                                       'options' => array(
                                                           'route'    => '/success',
                                                           'defaults' => array(
                                                               'controller' => 'ZfcAdmin\Controller\AdminController',
                                                               'action'     => 'success',
                                                           ),
                                                       ),
                                                   ),
                                                ),
                                        ),
                                                'hostels' => array(
                                                    'type'    => 'segment',
                                                    'options' => array(
                                                        'route'    => '/hostels[/][:action]',
                                                        'constraints' => array(
                                                            'action' => '[a-zA-Z][a-zA-Z0-9_-]*',

                                                        ),
                                                        'defaults' => array(
                                                            'controller' => 'ZfcAdmin\Controller\AdminController',
                                                            'action'     => 'hostels',
                                                        ),
                                                    ),
                                                    'may_terminate' => true,
                                                    'child_routes' => array(
                                                        'add' => array(
                                                            'type'    => 'literal',
                                                            'options' => array(
                                                                'route'    => '/add',
                                                                'defaults' => array(
                                                                    'controller' => 'ZfcAdmin\Controller\AdminController',
                                                                    'action'     => 'hostels_add',
                                                                ),
                                                            ),
                                                        ),
                                                        'success'=> array(
                                                            'type'    => 'literal',
                                                            'options' => array(
                                                                'route'    => '/success',
                                                                'defaults' => array(
                                                                    'controller' => 'ZfcAdmin\Controller\AdminController',
                                                                    'action'     => 'success',
                                                                ),
                                                            ),
                                                        ),
                                                    ),
                                                ),
                                    'attraction' => array(
                                        'type'    => 'literal',
                                        'options' => array(
                                            'route'    => '/attraction',
                                            'defaults' => array(
                                                'controller' => 'ZfcAdmin\Controller\AdminController',
                                                'action'     => 'attraction',
                                            ),
                                        ),
                                    ),
                                    'transport' => array(
                                        'type'    => 'literal',
                                        'options' => array(
                                            'route'    => '/transport',
                                            'defaults' => array(
                                                'controller' => 'ZfcAdmin\Controller\AdminController',
                                                'action'     => 'transport',
                                            ),
                                        ),
                                        'may_terminate' => true,
                                        'child_routes' => array(
                                            'minibus' => array(
                                                'type'    => 'segment',
                                                'options' => array(
                                                    'route'    => '/minibus[/][:action]',
                                                    'constraints' => array(
                                                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',

                                                    ),
                                                    'defaults' => array(
                                                        'controller' => 'ZfcAdmin\Controller\AdminController',
                                                        'action'     => 'minibus',
                                                    ),
                                                ),
                                                'may_terminate' => true,
                                                'child_routes' => array(
                                                    'minibus_add' => array(
                                                        'type'    => 'literal',
                                                        'options' => array(
                                                            'route'    => '/minibus_add',

                                                            'defaults' => array(
                                                                'controller' => 'ZfcAdmin\Controller\AdminController',
                                                                'action'     => 'minibus_add',
                                                            ),
                                                        ),
                                                    ),

                                                    'minibus_shedule' => array(
                                                        'type'    => 'segment',
                                                        'options' => array(
                                                            'route'    => '/minibus_shedule[/][:action]',
                                                            'constraints' => array(
                                                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
//                                                                'shedule_road_minibus_id' => '[a-zA-Z][a-zA-Z0-9_-]*',

                                                            ),
                                                            'defaults' => array(
                                                                'controller' => 'ZfcAdmin\Controller\AdminController',
                                                                'action'     => 'minibus_shedule',
                                                            ),
                                                        ),
                                                        'may_terminate' => true,
                                                        'child_routes' => array(
                                                            'minibus_shedule_add' => array(
                                                                'type'    => 'literal',
                                                                'options' => array(
                                                                    'route'    => '/add',
                                                                    'defaults' => array(
                                                                        'controller' => 'ZfcAdmin\Controller\AdminController',
                                                                        'action'     => 'minibus_shedule_add',
                                                                    ),
                                                                ),
                                                            ),
                                                            'minibus_shedule_edit' => array(
                                                                'type'    => 'segment',
                                                                'options' => array(
                                                                    'route'    => '/edit[/:shedule_road_minibus_id]',
                                                                    'constraints' => array(
                                                                        'shedule_road_minibus_id' => '[a-zA-Z][a-zA-Z0-9_-]*',

                                                                    ),
                                                                    'defaults' => array(
                                                                        'controller' => 'ZfcAdmin\Controller\AdminController',
                                                                        'action'     => 'minibus_shedule_edit',
                                                                    ),
                                                                ),
                                                            ),
                                                            'minibus_shedule_delete' => array(
                                                                'type'    => 'segment',
                                                                'options' => array(
                                                                    'route'    => '/delete[/:shedule_road_minibus_id]',
                                                                    'constraints' => array(
                                                                        'shedule_road_minibus_id' => '[a-zA-Z][a-zA-Z0-9_-]*',

                                                                    ),
                                                                    'defaults' => array(
                                                                        'controller' => 'ZfcAdmin\Controller\AdminController',
                                                                        'action'     => 'minibus_shedule_delete',
                                                                    ),
                                                                ),
                                                            ),
                                                        ),
                                                    ),

                                                 ),

                                            ),



                                        ),
                                    ),

                                //https://github.com/cgmartin/ZF2FileUploadExamples/blob/master/config/module.config.php
                                'upload' => array(
                                    'type' => 'literal',
                                    'options' => array(
                                        'route' => '/upload',
                                        'defaults' => array(
                                                'controller' => 'ZfcAdmin\Controller\AdminController',
                                                'action' => 'upload-form',

                                        ),
                                    ),

                                ),

                    ),
    /*------------------------------ restaurants route(fileupload  child routes) ----------------------------------*/
                ),

            ),
        ),



    'view_manager' => array(
        'template_path_stack' => array(
           'zfcadmin'=>  __DIR__ . '/../view'
        ),
    ),


);