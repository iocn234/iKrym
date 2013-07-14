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

namespace ZfcAdmin\Controller;

use Timetable\Model\TransportRoadMinibus;
use Timetable\Form\MinibusForm;

use Timetable\Model\SheduleRoadMinibus;
use Timetable\Form\SheduleMinibusForm;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Session\Container;

use Restaurant\Controller;
use Restaurant\Form\RestaurantForm;
use Restaurant\Model\Restaurant;


use Hostel\Form\HostelForm;
use Hostel\Model\Hostel;

use ZfcAdmin\Form\UploadForm;




class AdminController extends AbstractActionController
{
        protected $sessionContainer;


        protected $restaurantsTable;


        protected $hostelsTable;

         /*------ATTRACTION TABLES-------*/
        protected $attractionTable;



        /*------TRANSPORT TABLES-------*/

        protected $transportRoadMinibusTable;
        protected $sheduleRoadMinibusTable;


        const ROUTE_LOGIN   = 'zfcuser/login';

        public function __construct(){
            $this->sessionContainer = new Container('file_upload_examples');
        }

        public  function indexAction(){
            if (!$this->zfcUserAuthentication()->hasIdentity()) {
                return $this->redirect()->toRoute(static::ROUTE_LOGIN);
            }
            else
            $admin_view = new ViewModel();
            $content_admin_view = new ViewModel();
            $content_admin_view->setTemplate('zfc-admin/block/content_admin');
            $admin_view->addChild($content_admin_view,'content_admin');
            return $admin_view;
        }

        /*------------------------------RESTAURANTS CONTROLLER-------------------------------------*/

        public  function restaurantsAction(){
            $view = new ViewModel();

            $restaurants = $this->getRestaurantsTable()->fetchAll();
            $view->setVariable('restaurants',$restaurants);
            return $view;
        }


        public function getRestaurantsTable()
        {
            if (!$this->restaurantsTable) {
                $sm = $this->getServiceLocator();
                $this->restaurantsTable = $sm->get('Restaurant\Model\RestaurantTable');
            }
            return $this->restaurantsTable;
        }


        public  function restaurantsAddAction(){
            $form = new RestaurantForm();

            $form->get('submit')->setValue('Добавить ресторан');


            $request = $this->getRequest();
            if ($request->isPost()) {
                $restaurant = new Restaurant();
                $form->setInputFilter($restaurant->getInputFilter());

                // Make certain to merge the files info!
                $data= array_merge_recursive(
                    $this->getRequest()->getPost()->toArray(),
                    $this->getRequest()->getFiles()->toArray()
                );
                $form->setData($data);
                if ($form->isValid()){

                    //array_map('unlink', glob('./public/img/restaurants*'));{
//                    $restaurant->exchangeImage($form->getData());
                    $restaurant->exchangeArray($form->getData());
                   // $restaurant->e
                    $this->getRestaurantsTable()->saveRestaurant($restaurant);

                    // Form is valid, save the form!
                    return $this->redirectToSuccessPage($form->getData());

                    // Redirect to list of albums
                   // return $this->redirect()->toRoute('zfcadmin/restaurants');
                }


            }
           //else return $this->redirect()->toRoute('zfcadmin');
            return array('form' => $form);
        }


        /*------------------------------------------------------------------------------------------*/

        /*------------------------------HOSTEL CONTROLLER-------------------------------------------*/

            public  function hostelsAction(){
                $view = new ViewModel();

                $hostels= $this->getHostelsTable()->fetchAll();
                $view->setVariable('hostels',$hostels);
                return $view;
            }
            public function getHostelsTable()
            {
                if (!$this->hostelsTable) {
                    $sm = $this->getServiceLocator();
                    $this->hostelsTable = $sm->get('Hostel\Model\HostelTable');
                }
                return $this->hostelsTable;
            }
            public  function hostelsAddAction(){
                $form = new HostelForm();

                $form->get('submit')->setValue('Добавить гостиницу');


                $request = $this->getRequest();

                if ($request->isPost()) {
                    $hostel = new Hostel();
                           $form->setInputFilter($hostel->getInputFilter());

                    // Make certain to merge the files info!
                    $data= array_merge_recursive(
                        $this->getRequest()->getPost()->toArray(),
                        $this->getRequest()->getFiles()->toArray()
                    );
                    $form->setData($data);
                    if ($form->isValid()){
                            $hostel->exchangeArray($form->getData());
                        // $restaurant->e
                                $this->getHostelsTable()->saveHostel($hostel);

                        // Form is valid, save the form!
                        return $this->redirectToSuccessPage($form->getData());

                        // Redirect to list of albums
                        // return $this->redirect()->toRoute('zfcadmin/restaurants');
                    }


                }
                //else return $this->redirect()->toRoute('zfcadmin');
                return array('form' => $form);
            }

        /*---------------------------------ATTRACTION CONTROLLER-------------------------------------*/

        public  function attractionAction(){
            $attraction_view = new ViewModel();

            $attraction_table = $this->getAttractionTable()->fetchAll();

            $attraction_view->setVariable('attraction_table', $attraction_table);
            return $attraction_view;
        }
        public function getAttractionTable(){
            if (!$this->attractionTable) {
                $sm = $this->getServiceLocator();
                $this->attractionTable = $sm->get('Attraction\Model\AttractionTable');
            }
            return $this->attractionTable;
        }
        /*------------------------------------------------------------------------------------------*/

        /*---------------------------------TRANSPORT CONTROLLER-------------------------------------*/

        public  function transportAction(){
            $transport = new ViewModel();

            $transport_road_minibus = $this->getTransportRoadMinibusTable()->fetchAll();
            $shedule_road_minibus = $this->getSheduleRoadMinibusTable()->fetchAll();
            $transport->setVariable('transport_road_minibus', $transport_road_minibus);
            $transport->setVariable('shedule_road_minibus', $shedule_road_minibus);
            return $transport;
        }
        public  function minibusAddAction(){
            //$form = new RestaurantsForm();
            $transport_form = new MinibusForm();
            $transport_form->get('submit')->setValue('Добавить маршрутку');

            $request = $this->getRequest();
            if ($request->isPost()) {

                $transport_road_minibus = new TransportRoadMinibus();
               // $transport_road_minibus->setInputFilter($restaurants->getInputFilter());
                $transport_form->setData($request->getPost());


                if ($transport_form->isValid()) {
                    $transport_road_minibus->exchangeArray($transport_form->getData());
                    $this->getTransportRoadMinibusTable()->saveTransportRoadMinibus($transport_road_minibus);

                    // Redirect to list of albums
                    return $this->redirect()->toRoute('zfcadmin/transport');
                }
            }
            return array('form' => $transport_form);
        }
        public  function minibusSheduleAction(){

        }
        public  function minibusSheduleAddAction(){
            $shedule_minibus_form = new SheduleMinibusForm();
            //$transport_form = new MinibusForm();


            $shedule_minibus_form->get('submit')->setValue('Добавить расписание');

            $request = $this->getRequest();
            if ($request->isPost()) {

                $shedule_road_minibus = new SheduleRoadMinibus();
                // $transport_road_minibus->setInputFilter($restaurants->getInputFilter());
                $shedule_minibus_form->setData($request->getPost());


                if ($shedule_minibus_form->isValid()) {
                    $shedule_road_minibus->exchangeArray($shedule_minibus_form ->getData());
                    $this->getSheduleRoadMinibusTable()->saveSheduleRoadMinibus($shedule_road_minibus);

                    // Redirect to list of albums
                    return $this->redirect()->toRoute('zfcadmin/transport');
                }
            }
            return array('form' => $shedule_minibus_form );
        }
        public  function minibusSheduleEditAction(){

        }

        public function getTransportRoadMinibusTable()
        {
            if (!$this->transportRoadMinibusTable) {
                $sm = $this->getServiceLocator();
                $this->transportRoadMinibusTable= $sm->get('Timetable\Model\TransportRoadMinibusTable');
            }
            return $this->transportRoadMinibusTable;
        }
        public function getSheduleRoadMinibusTable(){
            if (!$this->sheduleRoadMinibusTable) {
                $sm = $this->getServiceLocator();
                $this->sheduleRoadMinibusTable= $sm->get('Timetable\Model\SheduleRoadMinibusTable');
            }
            return $this->sheduleRoadMinibusTable;
        }
        /*------------------------------------------------------------------------------------------*/

            public function successAction()
            {
                return array(
                    'formData' => $this->sessionContainer->formData,
                );
            }

            protected function redirectToSuccessPage($formData = null)
            {
                $this->sessionContainer->formData = $formData;
                $response = $this->redirect()->toRoute('zfcadmin/restaurants/success');
                $response->setStatusCode(303);
                return $response;
            }

}