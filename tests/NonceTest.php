<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 16/06/2018
 * Time: 16:00
 */
use PHPUnit\Framework\TestCase;

require __DIR__ . "/../src/Nonce.php";

class NonceTest extends TestCase {

	public function testGetUserID() {
		$a = new Nonce(86400);
		var_dump($a);
	}

	public function testGetSession() {
		echo "2";
	}
}

