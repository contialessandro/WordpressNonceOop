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

	private static $config;
	private static $originalConfig = [];

	public static function setUpBeforeClass()
	{
		self::$config = new \Nonces\ConfigSetter();
		return self::$originalConfig = [
			'setLifespan'     => self::$config->getLife(),
			'setAlgorithm'    => self::$config->getAlgorithm(),
			'setSalt'         => self::$config->getSalt(),
			'setSessionToken' => self::$config->getSession(),
			'setUserId'       => self::$config->getUserId(),
		];
	}
	public function testLife()
	{
		$this->assertNotEquals(1, self::$config->getLife());
		$config = new \Nonces\ConfigSetter();
		$config->setLife(1);
		$this->assertEquals($config->setLife(1), self::$config->getLife());
	}
	public function testAlg()
	{
		$this->assertTrue('1', self::$config->getAlgorithm());
		$config = new \Nonces\ConfigSetter();
		$this->assertEquals($config->setAlgorithm("md5"), self::$config->getAlgorithm());
	}

//	public function testGetUserID() {
//		$config = new \Nonces\ConfigSetter();
//		$this->salt = $config->setSalt();
//		$this->alg = $config->getAlgorithm();
//		$this->validationLength = $config->getLife();
//		$this->userId = $config->getUserID();
//		$this->token = $config->getSession();
//		var_dump($config);
//	}
//
//	public function testGetSession() {
//		echo "d";
//		$this->assertSame('d','d');
//	}
}
