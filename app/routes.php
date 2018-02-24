<?php

$route = new \Klein\Klein();

$addressController = "App\\Controllers\\AddressController";

$route->respond('GET', '/addresses', [$addressController, 'index']);
$route->respond('GET', '/addresses/search/[:field]/[:query]', [$addressController, 'search']);
$route->respond('POST', '/addresses', [$addressController, 'store']);

$route->dispatch();
