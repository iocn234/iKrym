<?php
namespace Hostel;
// Add these import statements:
use Hostel\Model\Hostel;
use Hostel\Model\HostelTable;


use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Adapter\Adapter;
use Zend\Db\Adapter\Driver\Pdo;

class Module
{
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
    // Add this method:
    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'Hostel\Model\HostelTable' =>  function($sm) {
                    $tableGateway = $sm->get('HostelTableGateway');
                    $table = new HostelTable($tableGateway);
                    return $table;
                },
                'HostelTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Hostel());
                    return new TableGateway('hostel', $dbAdapter, null, $resultSetPrototype);
                },
            ),

        );

    }
}