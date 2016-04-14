<?php
$account = trim($this->get_account('filesloop.com'));
if (stristr($account,':')) list($user, $pass) = explode(':',$account);
else $cookie = $account;
if(empty($cookie)==false || ($user && $pass)){
	for ($j=0; $j < 2; $j++){

		if(!$cookie) $cookie = $this->get_cookie("filesloop.com");
		if(!$cookie){
			$data = $this->curl("http://www.filesloop.com/api/login?email=".urlencode($user)."&password=".urlencode($pass), "", "", 0);
			$page = @json_decode($data, true);
			$cookie = $page['data']['token'];
			$this->save_cookies("filesloop.com",$cookie);
		}

		$this->cookie = $cookie;
		$data = $this->curl("http://www.filesloop.com/api/exists?token=".$cookie."&url=".urlencode($url), '', '', 0);
		$page = @json_decode($data, true);
		if($page['error'] == null && $page['data']['exists'] == "true"){
			$data = $this->curl("http://www.filesloop.com/api/filelink?token=".$cookie."&url=".urlencode($url), '', '', 0);
			$page = @json_decode($data, true);
			if($page['error'] == null){
				$link = trim($page['data']['link']);
				$size_name = Tools_get::size_name($link, '');
				$filesize = $size_name[0];
				$filename = $size_name[1];
				break;
			}
		}
		elseif($page['error'] == null && $page['data']['exists'] == "false") die(Tools_get::report($Original,"dead"));
		else {
				$cookie = "";
				$this->save_cookies("filesloop.com","");
		}
	}
}


/*
* Home page: http://vinaget.us
* Blog:	http://blog.vinaget.us
* Script Name: Vinaget 
* Version: 2.6.3
* Created: Steam (Thursday, Jan 28, 2016)
*/
?>