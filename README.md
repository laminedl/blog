# Project for learn purpose.

It contains a several component like backoffice, blog, service.

## The entry point

The entry point is the index.php file.
Below is the content of the file (index.php).

	require '../vendor/autoload.php';
	//Create new application 
	$app = new App\App(['settings' => ['displayErrorDetails' => true]]);
	// Start application now
	$app->run();


