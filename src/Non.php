<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 09/06/2018
 * Time: 19:09
 */
namespace Nonces;
use Nonces\ConfigSetter;
class Non {


	protected $nonce;
	protected $input;

	protected $validationLength = 86400; //default time length is 1 Day in seconds. Set different value in class construct
	protected $salt;
	protected $alg = 'md5';
	protected $userId;
	protected $token;
	/**
	 * constructor For generating Nonce
	 *
	 * @param  int  $lengthInSeconds nonce validity
	 * @param object $config ConfigSetter object
	 * @access public
	 */
	public function __construct($lengthInSeconds/*, ConfigSetter $config = null*/){
		$config = new ConfigSetter();
		$this->salt = $config->setSalt();
		$this->alg = $config->getAlgorithm();
		$this->validationLength = $config->getLife();
	}

	/**
	 * get Salt from Config.
	 *
	 * @return salt from Config
	 */
	public function getSalt(){
		return $this->salt;
	}

	/**
	 * get Salt from Config
	 *
	 * @return new nonce
	 */
	public function generateNonce(){
		$this->nonce = crypt($this->input, $this->salt);
		return $this->nonce;
	}
	public function printText($text=1){
		return ['salt'=>$this->salt, 'time'=>$this->validationLength];
	}
}