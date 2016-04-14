<?php
$account = trim($this->get_account('simply-debrid.com'));
if (stristr($account,':')) list($user, $pass) = explode(':',$account);
else $cookie = $account;
if(empty($cookie)==false || ($user && $pass)){
	for ($j=0; $j < 2; $j++){
		if(!$cookie) $cookie = $this->get_cookie("simply-debrid.com");
		if(!$cookie){
			$data = $this->curl("https://simply-debrid.com/login","",'user='.$user.'&pwd='.$pass);
			$cookie = $this->GetCookies($data);
			$this->save_cookies("simply-debrid.com",$cookie);
		}
		$this->cookie = $cookie;
		$data = $this->curl("https://simply-debrid.com/inc/generate/name.php?i=".base64_encode($url),$cookie,'',0);
		$veri = json_decode($data, true);
		$lol = $veri['generated'];
		$link = trim($lol);
		$size_name = Tools_get::size_name($link, $this->cookie);
		$filesize = $size_name[0];
		$filename = $size_name[1];
	}
}
	/*
	* Website: http://erkancevik.com
	* Skype: Erkan_20342034
	* Facebook: https://www.facebook.com/erkan.cevik.330
	* Nice days!
	* Vinaget 2.6.3
	*/
?>