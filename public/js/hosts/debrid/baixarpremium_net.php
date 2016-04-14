<?php
$account = trim($this->get_account('baixarpremium.net'));
if (stristr($account,':')) list($user, $pass) = explode(':',$account);
else $cookie = $account;
if(empty($cookie)==false || ($user && $pass)){
	for ($j=0; $j < 2; $j++){
		if(!$cookie) $cookie = $this->get_cookie("baixarpremium.net");
		if(!$cookie){
			$data = $this->curl("http://baixarpremium.net/acoes/deslogado/logar.php", "", "login=".urlencode($user)."&senha=".urlencode($pass));
			$cookie = $this->GetCookies($data);
			$this->save_cookies("baixarpremium.net", $cookie);
		}

		$this->cookie = $cookie;
		function strToHex($string){
			$hex='';
			for ($i=0; $i < strlen($string); $i++){
				$hex .= dechex(ord($string[$i]));
			}
			return $hex;
		}
		preg_match('/utmhb=utmcsr(.*?);/', $cookie, $keypass);
		$data = $this->curl("http://baixarpremium.net/api/index.php?link=".strToHex($url)."&keypass=utmcsr".trim($keypass[1]), "", "", 0);

		if(preg_match('#(https?:\/\/(\w+\.)?baixarpremium\.net\/baixar\/.+)#', $data, $catch)){
			$link = trim($catch[1]);
			$size_name = Tools_get::size_name($link, '');
			if($size_name[0] > 200 ){
				$filesize = $size_name[0];
				$filename = $size_name[1];
				break;
			}
		}
		else {
			$cookie = "";
			$this->save_cookies("baixarpremium.net", "");
		}
	}
}
/*
* Home page: http://vinaget.us
* Blog:	http://blog.vinaget.us
* Script Name: Vinaget 
* Version: 2.6.3
* Created: Steam (Sunday, January 24, 2016)
*/
?>