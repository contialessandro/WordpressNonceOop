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

	/*
	 * salt
	 * time
	 * userid
	 * token
	 * algorithm*/




	public function setUserID($userId){
		return $this->userId = $userId;
	}
	public function getUserID(){
		return $this->userId;
	}


	public function setSession($token){
		return $this->token = $token;
	}
	public function getSession(){
		return $this->token;
	}


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


	public function setLife($timeValidator){
		return $this->validationLength = $timeValidator;
	}
	public function getLife(){
		return $this->validationLength;
	}

	public function setAlgorithm($alg){
		return $this->alg = $alg;
	}
	public function getAlgorithm(){
		return $this->alg;
	}
}