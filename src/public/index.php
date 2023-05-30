<?php

include 'ErrorHandler.php';
include ('Sensitive.php');


set_error_handler("ErrorHandler::handleError");
set_exception_handler("ErrorHandler::handleException");

header("content-type: application/json; charset=UTF-8 ");

spl_autoload_register(function ($class) {
    require "$class.php";
});

$parts = explode('/', $_SERVER['REQUEST_URI']);

$id = $parts[2] ?? null;

$database = new Database($DB_HOST,"$DB_NAME","$DB_USER","$DB_PASSWORD");

$gateway = new ProductGateway($database);
$controller = new ProductController($gateway);

$controller->processRequest($_SERVER['REQUEST_METHOD'], $id);