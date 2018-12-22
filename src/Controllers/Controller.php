<?php 

namespace App\Controllers;


use Psr\Http\Message\ResponseInterface;
use Slim\Http\Stream;

class Controller
{
	/**
	*Twig_Environment $twig
	*/
	private $twig;

   public function __construct()
   {
        $loader = new \Twig_Loader_Filesystem(dirname(dirname(__DIR__)). DIRECTORY_SEPARATOR.'templates');
        $twig =  new \Twig_Environment($loader,[
          'cache' => false
        ]);
        $this->twig = $twig;
   }

   public function render(ResponseInterface $response, string $path, array $data = []):ResponseInterface
   {
      $content = $this->twig->render($path, $data);
      $body = new Stream(fopen('php://temp', 'w'));
      $body->write($content);
      return $response->withBody($body);

   }

}