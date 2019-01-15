<?php 

namespace App\Controllers\Blog;

use Slim\Views\Twig;
use App\Controllers\Controller;
use Psr\Http\Message\ResponseInterface;


class PostController extends Controller
{

    public function index(Twig $twig, ResponseInterface $response)
    {
        return $twig->render($response, 'blog/posts/index.html.twig');
        
    }
}