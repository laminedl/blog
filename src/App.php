<?php

namespace App;

use Slim\App as Slim;

class App extends Slim
{

   private $webRoutesDir = 'routes/web.php';

   private $apiRoutesDir;

   public function __construct(array $config = [])
   {
       parent::__construct($config);
       //Load routes  form /routes/web.php
       $this->configure();
       $this->loadRoutes();

   }

    private function loadRoutes(string $path = null)
    {
        $path = file_exists($path) ? $path  : $this->getDefautRoutesDir();
        $app = $this;
        require $path;
    }

    private function getDefautRoutesDir():string
    {
        return dirname(__DIR__).DIRECTORY_SEPARATOR.$this->webRoutesDir;
       
    }

    private function configure():void
    {
      

    }
}