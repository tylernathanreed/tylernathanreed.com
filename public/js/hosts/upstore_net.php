<?php
if (preg_match('#^(http|https)\:\/\/(www\.)?upstore\.net/#', $url)){
	$account = trim($this->get_account('upstore.net'));
	if (stristr($account,':')) list($user, $pass) = explode(':',$account);
	else $cookie = $account;
	if(empty($cookie)==false || ($user && $pass)){
		for ($j=0; $j < 2; $j++){
			if(!$cookie) $cookie = $this->get_cookie("upstore.net");
			if(!$cookie){
				$data =  $this->curl("https://upstore.net/account/login/","","url=https%253A%252F%252Fupstore.net%252F&send=Login&email=" . urlencode($user) . "&password=" . urlencode($pass));
				$cookie = "lang=en;".$this->GetCookies($data);
				$this->save_cookies("upstore.net",$cookie);
			}
			$this->cookie = $cookie;
			$data =  $this->curl($url,$cookie,"");
			if (strpos($data,'error">File not found<') || strpos($data,'File was deleted by owner')) die(Tools_get::report($Original,"dead"));
			elseif (strpos($data,'have reached a download limit for today')) die("Account out of bandwidth.");
			elseif(preg_match('/ocation: *(.*)/i', $data, $redir)){
				$link = trim($redir[1]);
				$size_name = Tools_get::size_name($link, $this->cookie);
				$filesize = $size_name[0];
				$filename = $size_name[1];
				break;
			}
			else {
				$cookie = "";
				$this->save_cookies("upstore.net","");
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