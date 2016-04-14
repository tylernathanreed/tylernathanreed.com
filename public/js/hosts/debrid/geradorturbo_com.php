<?php
$account = trim($this->get_account('geradorturbo.com'));
if (stristr($account,':')) list($user, $pass) = explode(':',$account);
else $cookie = $account;
if(empty($cookie)==false || ($user && $pass)){
	for ($j=0; $j < 2; $j++){
		if(!$cookie) $cookie = $this->get_cookie("geradorturbo.com");
		if(!$cookie){
			$data = $this->curl("http://198.50.228.26/login.php", "", "txtEmail=".urlencode($user)."&txtSenha=".urlencode($pass)."&btnSubmited=Entrar");
			$cookie = $this->GetCookies($data);
			$this->save_cookies("geradorturbo.com", $cookie);
		}
		$this->cookie = $cookie;
		$cookie = "email=".str_replace($user,"@","-")."; ".$cookie;
		$get = $this->curl("http://198.50.228.26/downloader", $cookie, "");
		preg_match('/src=\"\/(.*)\/ajax-all.js/', $get, $matches);
		$data = $this->curl("http://198.50.228.26/".trim($matches[1])."/gerador-all.php", $cookie, "urllist=".urlencode($url));
		if(preg_match("%download' href='(.*)' style%U", $data, $linkpre)){
			$link = trim($linkpre[1]);
			if(stripos($url, 'uploaded.net') || stripos($url,'ul.to')){
				$data = $this->curl($link, "", "");
				preg_match('/ocation: *(.*)/i', $data, $steam);
				$link = trim($steam[1]);
				$data = $this->curl($link, "", "");
				preg_match('/ocation: *(.*)/i', $data, $last);
				$link = trim($last[1]);
			}
			$size_name = Tools_get::size_name($link, '');
			$filesize = $size_name[0];
			$filename = $size_name[1];
			break;	
		}
		else {
			$cookie = "";
			$this->save_cookies("geradorturbo.com", "");
		}
	}
}
/*
* Home page: http://vinaget.us
* Blog:	http://blog.vinaget.us
* Script Name: Vinaget 
* Version: 2.6.3
* Created: Steam (Saturday, August 15, 2015)
* Fixed: Steam (Monday, August 15, 2015)
* Edited: Steam (Sunday, August 23, 2015)
*/
?>