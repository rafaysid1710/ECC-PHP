<?php
set_include_path(get_include_path() . PATH_SEPARATOR . 'phpseclib');
use PHPseclib\Crypt\PublicKey;

use phpseclib\Crypt\PrivateKey;
class ECC {

  public function getPublicKey() {

    
    $privateKey = random_bytes(32);

    
    $publicKey = $this->getPublicKeyFromPrivateKey($privateKey);

    return $publicKey;

  }

  public function getPrivateKey() {

    
    $privateKey = random_bytes(32);

    return $privateKey;

  }

  public function encrypt($plaintext, $publicKey) {

    
    $publicKeyObject = new PHPseclib\Crypt\PublicKey\ECC($publicKey);

    
    $ciphertext = $publicKeyObject->encrypt($plaintext);

    return $ciphertext;

  }

  public function decrypt($ciphertext, $privateKey) {

    
    $privateKeyObject = new PHPseclib\Crypt\PrivateKey\ECC($privateKey);

    
    $plaintext = $privateKeyObject->decrypt($ciphertext);

    return $plaintext;

  }

  private function getPublicKeyFromPrivateKey($privateKey) {

    
    $privateKeyObject = new PHPseclib\Crypt\PrivateKey\ECC($privateKey);

  
    $publicKey = $privateKeyObject->getPublicKey();

    return $publicKey;

  }

}

?>
