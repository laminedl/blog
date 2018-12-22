<?php

require '../vendor/autoload.php';


//Create new application 
$app = new App\App(['settings' => ['displayErrorDetails' => true]]);

// Start application now
$app->run();



