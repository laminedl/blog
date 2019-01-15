<?php 

require (__DIR__.'/public/index.php');


return 
[
    'paths' => [
     'migrations' => __DIR__.DIRECTORY_SEPARATOR.'db/migrations',
     'seeds' => __DIR__.DIRECTORY_SEPARATOR.'db/seeds'
    ],
    'environments' => [
        'default_database' => 'development',
        'development' =>  [
            'connection' => $app->getConnection(),
            'name' => 'blog_db'
        ]
    ]
];