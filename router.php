<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path']; //grab path dari superglobal REQUEST_URI

$routes = [
    '/' => 'controllers/index.php',
    '/contact' => 'controllers/contact.php',
    '/notes' => 'controllers/notes.php',
    '/note' => 'controllers/note.php',
    '/about' => 'controllers/about.php'

];

// test array jika key/value ada, barulah require file
function routeToController($uri, $routes) 
{
    if(array_key_exists($uri, $routes))
    {
        require $routes[$uri]; // require file untuk dipanggil
    } 
    else
    {
        abort();
    }
}

function abort()
{
    http_response_code(404);
    require 'views/404.php';
    die(404);

}

routeToController($uri, $routes);