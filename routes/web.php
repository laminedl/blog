<?php 


$app->get('/', 'App\Controllers\HomeController')->setName('welcome');


$app->get('/blog', ['App\Controllers\Blog\PostController', 'index'])->setName('blog.index');


$app->get('/blog/admin', ['App\Controllers\Blog\Admin\PostController', 'index'])->setName('blog.admin.index');

$app->get('/blog/admin/create', ['App\Controllers\Blog\Admin\PostController', 'create'])->setName('blog.admin.create');


