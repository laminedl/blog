<?php

namespace App\Controllers;

use Slim\Views\Twig;
use Psr\Http\Message\ResponseInterface;
use Illuminate\Database\Capsule\Manager;
use Psr\Http\Message\ServerRequestInterface;




class HomeController extends Controller
{

	public function  __invoke(Twig $twig ,ServerRequestInterface $request, ResponseInterface $response)
	{
          		
        return $twig->render($response, 'home/welcome.html.twig');
	}
	
}