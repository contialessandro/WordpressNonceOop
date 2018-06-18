<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 16/06/2018
 * Time: 13:49
 */
use PHPUnit\Framework\TestCase;

require __DIR__ . "/../src/ConfigSetter.php";

class ConfigSetterTest extends TestCase {

	public function testGetUserID() {
		$a = new \Nonces\ConfigSetter();
		var_dump($a);
	}

	public function testGetSession() {
		echo "d";
		$this->assertSame('d','d');
	}
}
