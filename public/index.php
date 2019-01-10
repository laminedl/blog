<?php

require '../vendor/autoload.php';

//App Configuration 
$config = [
	'settings' => [ 'displayErrorDetails' => true ]
]
;
//Create new application 
$app = new App\App($config);


// Start application now
$app->run();

