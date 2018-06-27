# Wordpress Object Oriented library for wp_nonce;
Orignal library can be found at: https://codex.wordpress.org/WordPress_Nonces

set configuration with the below methods
```
			'setLifespan'     => self::$config->getLife(),
			'setAlgorithm'    => self::$config->getAlgorithm(),
			'setSalt'         => self::$config->setSalt(),
			'setSessionToken' => self::$config->getSession(),
			'setUserId'       => self::$config->getUserId(),
			
```

			
### Create Nonce
#### Will need salt and algortithm set before calling the below method
``` php
$nonce = new Nonce();
$nonce->generateNonce();
```

### Verify Nonce

``` php
$verifier = new Nonce($input,$nonce);
$verifier->compare($nonce, $action);
```
