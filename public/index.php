<?php

use Illuminate\Database\Capsule\Manager;

require_once dirname(__DIR__).'/vendor/autoload.php';


//Create new application 
$app = new App\App();


// Start application now
if(php_sapi_name() === "cli-server"){
    $app->run();
}

