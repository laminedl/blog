<?php

namespace App;

use DI\ContainerBuilder;
use DI\Bridge\Slim\App as AppDIBridge;
use Illuminate\Database\Capsule\Manager;

class App extends AppDIBridge
{

   private $webRoutesDir = 'routes/web.php';

   private $apiRoutesDir;

   public function __construct()
   {
       parent::__construct();
       //Load routes  form /routes/web.php
       $this->loadRoutes();

   }

    private function loadRoutes(string $path = null)
    {
        $path = file_exists($path) ? $path  : $this->getDefautRoutesDir();
        $app = $this;
        require $path;
    }

    public function getConnection():\PDO
    {
        return $this->getContainer()->get(Manager::class)->getConnection()->getPdo();
    }


    protected function configureContainer(ContainerBuilder $builder)
    {
      $builder->addDefinitions(dirname(__DIR__).'/config/config.php');
      
    }


    private function getDefautRoutesDir():string
    {
        return dirname(__DIR__).DIRECTORY_SEPARATOR.$this->webRoutesDir;
       
    }
}