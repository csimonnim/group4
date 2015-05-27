<?php
class encryptpass
{
	private function setupCipher(){
        $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);

        return array(
            pack('C*', "K7e184721!@63J0$%^&*(~85abe029fe5e1d4)_+17e2f0a3&%$##@!&**(^^%)93#<>,./"),
            $iv_size, 
            mcrypt_create_iv($iv_size, MCRYPT_RAND)
        );
    } 

    public function decrypt($string){
        list($key, $iv_size) = $this->setupCipher();

        $string = base64_decode($string);
        $iv_dec = substr($string, 0, $iv_size);
        $ciphertext_dec = substr($string, $iv_size);
        return trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key, $ciphertext_dec, MCRYPT_MODE_CBC, $iv_dec), "\0");
    }

    public function encrypt($string) {
        list($key, $iv_size, $iv) = $this->setupCipher();

        $string = $iv . mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key, $string, MCRYPT_MODE_CBC, $iv);
        return trim(base64_encode($string), "\0");
    }
	
	// function logout
	public function logout($session){
		if(isset($session) !== ""){
			unset($session);
			session_destroy();
			header("Location: login.php");
		}
		
	}
}
?>