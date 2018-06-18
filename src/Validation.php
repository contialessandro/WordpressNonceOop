<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 16/06/2018
 * Time: 17:04
 */

namespace Nonce;
use Nonces\ConfigSetter;
use Nonces\Non;


class Validation {

	public $userId;
	public $token;
	public $salt;
	public $alg;
	public $length;
	public $originalNonce;
	public $input;
	public $config;

	/**
	 * constructor For Validation purpose
	 *
	 * @param  int  $lengthInSeconds nonce validity
	 * @param object $config ConfigSetter object
	 * @access public
	 */
	public function __construct($lengthInSeconds, ConfigSetter $config = null){
		$this->userId = $config->getUserID();
		$this->token = $config->getSession();
		$this->salt = $config->getSalt();
		$this->alg = $config->getAlgorithm();
		$this->length = $config->getLife();
	}

	/**
	 * compare original token and the one passed from the request.
	 *
	 * @param string $input
	 *
	 * @param string $nonce
	 *
	 * @return int if true or false
	 */
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

	/**
	 * generate original nonce.
	 *
	 * @return string
	 */
	public function getOriginalNonce()
	{
		$originalNonce = new Nonce($this->length);
		$this->originalNonce =  $originalNonce->generateNonce();
	}
}