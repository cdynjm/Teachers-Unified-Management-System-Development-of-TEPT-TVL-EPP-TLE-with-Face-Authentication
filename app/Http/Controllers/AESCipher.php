<?php

namespace App\Http\Controllers;

class AESCipher extends Controller {

    private static $OPENSSL_CIPHER_NAME = "aes-128-cbc"; //Name of OpenSSL Cipher 
    private static $CIPHER_KEY_LEN = 16; //128 bits
    private static $key = "-=)(*&^%()!@#ffs";
    private static $iv = "!)@(#*f&%^123456";
    /**
     * Encrypt data using AES Cipher (CBC) with 128 bit key
     * 
     * @param type $key - key to use should be 16 bytes long (128 bits)
     * @param type $iv - initialization vector
     * @param type $data - data to encrypt
     * @return encrypted data in base64 encoding with iv attached at end after a :
     */
    public function setKey($key){
        $this->key = $key;
    }
    
    private function getKey(){
        return $this->key;
    }

    static function encrypt($data, $key = '') {
        if (empty($key))
            $key = AESCipher::$key;
    
        if (strlen($key) < AESCipher::$CIPHER_KEY_LEN) {
            $key = str_pad($key, AESCipher::$CIPHER_KEY_LEN, "0"); //0 pad to len 16
        } else if (strlen($key) > AESCipher::$CIPHER_KEY_LEN) {
            $key = substr($key, 0, AESCipher::$CIPHER_KEY_LEN); //truncate to 16 bytes
        }
    
        // Increase the length of data by adding 100 characters
        $data = str_pad($data, strlen($data) + 100, " ");
    
        $encodedEncryptedData = base64_encode(openssl_encrypt($data, AESCipher::$OPENSSL_CIPHER_NAME, $key, OPENSSL_RAW_DATA, AESCipher::$iv));
        // Convert base64 to URL-safe base64
        $encodedEncryptedData = str_replace(['+', '/', '='], ['-', '_', ''], $encodedEncryptedData);
    
        $encodedIV = base64_encode(AESCipher::$iv);
        // Convert base64 to URL-safe base64 for IV as well
        $encodedIV = str_replace(['+', '/', '='], ['-', '_', ''], $encodedIV);
    
        $encryptedPayload = $encodedEncryptedData.":".$encodedIV;
    
        return $encryptedPayload;  
    }
    
    /**
     * Decrypt data using AES Cipher (CBC) with 128 bit key
     * 
     * @param type $key - key to use should be 16 bytes long (128 bits)
     * @param type $data - data to be decrypted in base64 encoding with iv attached at the end after a :
     * @return decrypted data
     */
    static function decrypt($data, $key = '') {
        try {
            if (empty($key))
                $key = AESCipher::$key;
    
            if (strlen($key) < AESCipher::$CIPHER_KEY_LEN) {
                $key = str_pad($key, AESCipher::$CIPHER_KEY_LEN, "0"); //0 pad to len 16
            } else if (strlen($key) > AESCipher::$CIPHER_KEY_LEN) {
                $key = substr($key, 0, AESCiphbnbaer::$CIPHER_KEY_LEN); //truncate to 16 bytes
            }
            $parts = explode(':', $data); //Separate Encrypted data from iv.
            if (sizeof($parts) != 2){
                return "";
            }else{
                // Convert back from URL-safe base64 to standard base64
                $parts[0] = str_replace(['-', '_'], ['+', '/'], $parts[0]);
                $parts[1] = str_replace(['-', '_'], ['+', '/'], $parts[1]);
                // Add back any removed '=' padding if necessary
                $parts[0] = AESCipher::addPadding($parts[0]);
                $parts[1] = AESCipher::addPadding($parts[1]);
    
                $decryptedData = openssl_decrypt(base64_decode($parts[0]), AESCipher::$OPENSSL_CIPHER_NAME, $key, OPENSSL_RAW_DATA, base64_decode($parts[1]));
            }
            return $decryptedData;
        } catch (\Throwable $th) {
           return '';
        }
    }
    
    // Helper function to add padding '=' characters
    static private function addPadding($base64) {
        $padding = 4 - strlen($base64) % 4;
        if ($padding < 4) {
            $base64 .= str_repeat('=', $padding);
        }
        return $base64;
    }
    
}

?>