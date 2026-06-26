<?php
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = trim($uri, '/');
$file = $uri === '' ? 'index' : $uri;

// Si el link ya viene con .php (ej: about.php), quitarlo para no duplicarlo
if (str_ends_with($file, '.php')) {
    $file = substr($file, 0, -4);
}

$path = __DIR__ . '/../' . $file . '.php';

chdir(__DIR__ . '/..');

if (file_exists($path)) {
    require $path;
} else {
    http_response_code(404);
    echo '404 - Página no encontrada';
}