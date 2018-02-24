<?php

$route = new \Klein\Klein();

$addressController = "App\\Controllers\\AddressController";

$route->respond('GET', '/hello-world', function () {
    return 'Hello World!';
});

$route->respond('GET', '/addresses', [$addressController, 'index']);
$route->respond('GET', '/addresses/search/[:field]/[:query]', [$addressController, 'search']);
$route->respond('GET', '/hello/[:name]', [$addressController, 'hello']);
$route->respond('POST', '/addresses', [$addressController, 'store']);
// $route->respond('PUT', '/addresses/[i:id]', [$addressController, 'update']);

$route->dispatch();
