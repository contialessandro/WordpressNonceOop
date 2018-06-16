<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 09/06/2018
 * Time: 19:09
 */
namespace AlessandroConti\Nonces;
use AlessandroConti\Nonces\ConfigSetter;
class Nonce {


	protected $nonce;
	protected $input;

	protected $validationLength = 86400; //default time length is 1 Day in seconds. Set different value in class construct
	protected $salt;
	protected $alg = 'md5';
	protected $userId;
	protected $token;

	public function __construct($lengthInSeconds, ConfigSetter $config = null){
		$config = New ConfigSetter();
//		$this->userId = $config->getUserID();
//		$this->token = $config->getSession();
		$this->salt = $config->getSalt();
		$this->alg = $config->getAlgorithm();
		$this->validationLength = $config->getLife();
		/*for testing pass bin2hex of random 10 bytes*/
		//		$this->salt = bin2hex(random_bytes(10));
	}

	public function getSalt(){
		return $this->salt;
	}
	public function generateNonce(){
		$this->nonce = crypt($this->input, $this->salt);
		return $this->nonce;
	}

	public function printText($text=1){
		return [$this->salt, $this->validationLength];
	}
}