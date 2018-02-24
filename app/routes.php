<?php

$klein = new \Klein\Klein();

$addressController = "App\\Controllers\\AddressController";
// $address = new App\Controllers\AddressController;
$klein->respond('GET', '/hello-world', function () {
    return 'Hello World!';
});

$klein->respond('GET', '/addresses', [$addressController, 'index']);

$klein->dispatch();
