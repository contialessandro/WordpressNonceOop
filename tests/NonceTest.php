<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 16/06/2018
 * Time: 16:00
 */
use PHPUnit\Framework\TestCase;

require __DIR__ . "/../src/Non.php";

class NonceTest extends TestCase {

	public function testGetUserID() {
		$nonce = new Nonces\Non(86400);
		$nonce->printText();
	}
//
//	public function testGetSession() {
//		echo "2";
//	}
	public static function setUpBeforeClass()
	{
//		self::$config = new \Nonces\ConfigSetter();
//
//		Config::setLifespan(86400);
//		Config::setSalt('salt');
//		Config::setUserId(1);
//		Config::setSessionToken('session-1');
	}

//	public function setUp()
//	{
//		time(self::$time);
//	}

	public function testCreation()
	{
		$nonce = new \Nonces\Non(86400);
		$this->assertEquals(self::$nonce, $nonce->generateNonce());
		$this->assertEquals(self::$nonce, (string)$nonce);
	}

	public static function tearDownAfterClass()
	{
//		Config::setLifespan(86400);
//		Config::setSalt(null);
//		Config::setUserId(null);
//		Config::setSessionToken(null);
	}
}

