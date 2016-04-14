<?php
if (preg_match('#^(http|https)\:\/\/(www\.)?uploadable\.ch/#', $url)){

	$account = trim($this->get_account('uploadable.ch'));
	if (stristr($account,':')) list($user, $pass) = explode(':',$account);
	else $cookie = $account;
	if(empty($cookie)==false || ($user && $pass)){
		for ($j=0; $j < 2; $j++){
			if(!$cookie) $cookie = $this->get_cookie("uploadable.ch");
			if(!$cookie){
				$data = $this->curl("https://www.uploadable.ch/login.php", "", "autoLogin=on&action__login=normalLogin&userName=" .urlencode($user). "&userPassword=" .urlencode($pass));
				$cookie = $this->GetCookies($data);
				$this->save_cookies("uploadable.ch", $cookie);
			}
			$this->cookie = $cookie;
			$data =  $this->curl($url,$cookie,"");
			if(strpos($data,'You have exceeded your download limit.')) die("Account out of Bandwidth.");
			if(strpos($data,'File not available')) die(Tools_get::report($Original,"dead"));
			elseif(preg_match('/ocation: *(.*)/i', $data, $redir)){
				$link = trim($redir[1]);
				$size_name = Tools_get::size_name($link, $this->cookie);
				$filesize = $size_name[0];
				$filename = $size_name[1];
				break;
			}
			else {
				$cookie = "";
				$this->save_cookies("uploadable.ch","");
			}
		}
	}
}


/*
* Home page: http://vinaget.us
* Blog:	http://blog.vinaget.us
* Script Name: Vinaget 
* Version: 2.6.3
* Created: Steam
*/
?>