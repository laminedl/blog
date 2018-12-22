<?php

namespace App\Controllers;


class HomeController extends Controller
{

	public function  __invoke($request, $response)
	{
        return $this->render($response, 'home/welcome.html.twig');
	}

}