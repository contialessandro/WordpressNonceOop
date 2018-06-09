<?php
require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using Composer autoload

use OopNonce\Nonce;

$echo = new Nonce();
echo $echo->printText('Hello').PHP_EOL;