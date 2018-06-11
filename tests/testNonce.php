<?php
require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using Composer autoload

use OopNonce\Nonce;

$echo = new Nonce(86400);
return print_r($echo->setNonce());