<?php

require_once 'ECC.php';

$ecc = new ECC();
if (isset($_POST['generate_keys'])) {

    
    

    $publicKey = $ecc->getPublicKey();
    $privateKey = $ecc->getPrivateKey();
    
    
    file_put_contents('public.key', $publicKey);
    file_put_contents('private.key', $privateKey);
    
    
    echo 'Keys generated successfully!';
    
    }
if (isset($_POST['encrypt'])) {

    $plaintext = $_POST['plaintext'];
    
    
    $publicKey = file_get_contents('public.key');
    
    
    $ciphertext = $ecc->encrypt($plaintext, $publicKey);
    
    
    echo 'Ciphertext: ' . $ciphertext;
    
    }
if (isset($_POST['decrypt'])) {

    $ciphertext = $_POST['ciphertext'];
    
    
    $privateKey = file_get_contents('private.key');
    
    
    $plaintext = $ecc->decrypt($ciphertext, $privateKey);
    
    
    echo 'Plaintext: ' . $plaintext;
    
    }
                
?>
