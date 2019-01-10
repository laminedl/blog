<?php 

namespace App\Controllers;

use Interop\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Slim\Http\Stream;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;

class Controller
{
	/**
	*Twig_Environment $twig
	*/
	private $twig;

  /**
  *ContainerInterface $container
  */
  private $container;


   public function __construct(ContainerInterface $container)
   {
        $this->container = $container;
        $loader = new \Twig_Loader_Filesystem(dirname(dirname(__DIR__)). DIRECTORY_SEPARATOR.'templates');
        $twig =  new \Twig_Environment($loader,[
          'cache' => false
        ]);
        $this->twig = $twig;

        $capsule = new Capsule;

        $capsule->addConnection([
          'driver' => 'mysql',
          'host' => 'localhost',
          'database' => 'blog',
          'username' => 'root',
          'password' => '',
          'charset' => 'utf8',
          'collation' => 'utf8_unicode_ci',
          'prefix' => ''

        ]);
        $capsule->setEventDispatcher(new Dispatcher(new Container));
        $capsule->setAsGlobal();
        $capsule->bootEloquent();

   }

   public function render(ResponseInterface $response, string $path, array $data = []):ResponseInterface
   {
      $content = $this->twig->render($path, $data);
      $body = new Stream(fopen('php://temp', 'w'));
      $body->write($content);
      return $response->withBody($body);

   }

}