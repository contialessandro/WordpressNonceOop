<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 16/06/2018
 * Time: 17:04
 */

namespace AlessandroConti\Nonce;
use AlessandroConti\Nonces\ConfigSetter;
use AlessandroConti\Nonces\Nonce;


class Validation {
	public $userId;
	public $token;
	public $salt;
	public $alg;
	public $length;
	public $originalNonce;
	public $input;
	public $config;


	public function __construct($lengthInSeconds, ConfigSetter $config = null){
		$this->config = New ConfigSetter();
		$this->userId = $config->getUserID();
		$this->token = $config->getSession();
		$this->salt = $config->getSalt();
		$this->alg = $config->getAlgorithm();
		$this->length = $config->getLife();
		/*for testing pass bin2hex of random 10 bytes*/
		//		$this->salt = bin2hex(random_bytes(10));
	}

	public function compare($input,$nonce){
		/*compare original nonce to the one passed from the form*/
		$this->input = $input;
		if($nonce && !empty($nonce))
		{
			if($nonce === $this->originalNonce)
			{
				return 1;
			}
			return 2;
		}
		return false;
	}

	public function getOriginalNonce()
	{
		$originalNonce = new Nonce($this->length);
		$this->originalNonce =  $originalNonce->generateNonce();
	}
}