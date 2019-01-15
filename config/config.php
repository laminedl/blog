<?php
use Slim\Views\Twig;
use Psr\Container\ContainerInterface;
use Illuminate\Database\Capsule\Manager;

return [
	'settings.displayErrorDetails' => true,
	Twig::class => function(ContainerInterface $container){
        $twig = new Twig(join('/', [dirname(__DIR__), 'templates']),[
			'cache' => false
		]);
		$twig->addExtension(new \Slim\Views\TwigExtension(
			$container->get('router'),
			$container->get('request')->getUri()
		));
		return $twig;
	},
	'settings.db' => function(ContainerInterface $container){
     return [
		'driver' => 'mysql',
		'host' => 'localhost',
		'database' => 'blog_db',
		'username' => 'root',
		'password' => '',
		'charset'   => 'utf8',
		'collation' => 'utf8_unicode_ci',
		'prefix'    => '',
	 ];
	
	},
	Manager::class => function(ContainerInterface $container){
		$capsule = new Manager();
		$capsule->addConnection($container->get('settings.db'));
		$capsule->setAsGlobal();
		$capsule->bootEloquent();
		return $capsule;
	}

];