<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 22/06/2018
 * Time: 07:17
 */

use PHPUnit\Framework\TestCase;

require __DIR__ . "/../src/NonceGenerator.php";

class NonceGeneratorTest extends TestCase {
	private static $config;
	private static $originalConfig = [];
	public function setters()
	{
		self::$config = new \Nonces\NonceGenerator();
		self::$originalConfig = [
			'setLifespan'     => self::$config->getLife(),
			'setAlgorithm'    => self::$config->getAlgorithm(),
			'setSalt'         => self::$config->setSalt(),
			'setSessionToken' => self::$config->getSession(),
			'setUserId'       => self::$config->getUserId(),
		];


	}

	public function testClass()
	{
		self::setters();
		var_dump(self::$config->generateNonce());
		var_dump(self::$originalConfig);
	}
	public function testValidation()
	{
		self::setters();
		$input = self::$config->input;
		$nonce = '43iMbF.lGGeH.';
		var_dump(self::$config->compare($input,$nonce));
	}
}
