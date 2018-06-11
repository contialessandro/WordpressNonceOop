<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 09/06/2018
 * Time: 19:09
 */
namespace OopNonce;

class Nonce {

	protected $validationLength = 86400; //default time length is 1 Day in seconds. Set different value in class construct
	protected $salt;
	protected $time;
	protected $nonce;
	protected $alg = 'md5';

	public function __construct($lengthInSeconds){
		$this->validationLength = $lengthInSeconds;
		$this->salt = bin2hex(random_bytes(10));
	}

	public function getSalt(){
		return $this->salt;
	}
	public function setNonce() {
		return $this->nonce = self::generateNonce('nonce parameter');
	}

	public function generateNonce($input){
		return crypt($input, $this->getSalt());
	}

	public function printText($text=1){
		return [$this->salt, $this->validationLength];
	}
}