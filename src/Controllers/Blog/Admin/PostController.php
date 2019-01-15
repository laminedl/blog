<?php 

namespace App\Controllers\Blog\Admin;

use Slim\Views\Twig;
use App\Controllers\Controller;
use Psr\Http\Message\ResponseInterface;


class PostController extends Controller
{

    public function index(Twig $twig, ResponseInterface $response)
    {

        return $twig->render($response, 'blog/admin/posts/index.html.twig');
        
    }

    public function create(Twig $twig, ResponseInterface $response)
    {
        
        return $twig->render($response, 'blog/admin/posts/create.html.twig');
        
    }
}