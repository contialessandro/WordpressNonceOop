<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 16/06/2018
 * Time: 16:00
 */
namespace tests;
use PHPUnit\Framework\TestCase;
;
class NonceTest extends TestCase {

	public function testGetUserID() {
		$a = new \Nonces\Nonce(86400);
		var_dump($a);
	}

	public function testGetSession() {
		echo "2";
	}
}

