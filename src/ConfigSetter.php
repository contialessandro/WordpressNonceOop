<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 16/06/2018
 * Time: 11:51
 */
namespace AlessandroConti\Nonces;

class ConfigSetter {

	public $validationLength = 86400; //default time length is 1 Day in seconds. Set different value in class construct
	public $salt;
	public $alg = 'md5';
	public $userId;
	public $token;

	/**
	 * setter for userId
	 *
	 * @param  string  $userId
	 *
	 * @access public
	 *
	 * return set $userId
	 */
	public function setUserID($userId){
		return $this->userId = $userId;
	}
	public function getUserID(){
		return $this->userId;
	}

	/**
	 * setter for session
	 *
	 * @param  string  $session
	 *
	 * @access public
	 *
	 * return set $session
	 */
	public function setSession($token){
		return $this->token = $token;
	}
	public function getSession(){
		return $this->token;
	}

	/**
	 * setter for Salt
	 *
	 * @param  string  $salt
	 *
	 * @access public
	 *
	 * return set $salt
	 */
	public function setSalt($salt=''){
		/*if salt is n ot passed use hex of 10 random_bytes()*/
		if(empty($salt))
		{
			return $this->salt = bin2hex(random_bytes(10));
		}
		/*if empty($salt) is false return passed parameter*/
		return $this->salt = $salt;
	}
	public function getSalt(){
		return $this->salt;
	}

	/**
	 * setter for Life
	 *
	 * @param  integer  $timeValidator
	 *
	 * @access public
	 *
	 * return set $validatonLength
	 */
	public function setLife($timeValidator){
		return $this->validationLength = $timeValidator;
	}
	public function getLife(){
		return $this->validationLength;
	}

	/**
	 * setter for algorithm
	 *
	 * @param  string  $alg
	 *
	 * @access public
	 *
	 * return set $alg
	 */
	public function setAlgorithm($alg){
		return $this->alg = $alg;
	}
	public function getAlgorithm(){
		return $this->alg;
	}
}