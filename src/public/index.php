<?php

include 'ErrorHandler.php';

set_error_handler("ErrorHandler::handleError");
set_exception_handler("ErrorHandler::handleException");

header("content-type: application/json; charset=UTF-8 ");

spl_autoload_register(function ($class) {
    require "$class.php";
});

$parts = explode('/', $_SERVER['REQUEST_URI']);

$id = $parts[2] ?? null;


$gateway = new ProductGateway($database);
$controller = new ProductController($gateway);

$controller->processRequest($_SERVER['REQUEST_METHOD'], $id);