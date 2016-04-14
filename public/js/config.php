<?php
$Secure = true;                        #true : private host - false : public host
$password= array("b1mra",);

$homepage = "";
$fileinfo_dir = 'data';                # name folder data
$fileinfo_ext = "dat";                # type file data
$filecookie ="cookie.php";        # file cookie

$download_prefix = "HeavenLinks:";
$limitMBIP = 100*102400000;        # limit load file for 1 IP (MB)
$ttl = 3*60;                                # time to live (in minutes)
$limitPERIP = 100;                # (files) limit file per mins
$ttl_ip = 1;                        #  (minutes) limit load file per time
$max_jobs_per_ip = 10000;        //total jobs for 1 IP  per time live
$max_jobs = 500000;                        # max total jobs in this host   
$max_load = 500;                        # max server load (%)

$title = " HeavenLinks| "; # Example: [color=red]http://10s.asia[/color]
$colorfilename = "#0066FF";
$colorfilesize = "#696969";

$ziplink = true;                        #true : enable Zip URL to http://adf.ly - false : disable Zip URL to http://adf.ly
# if you want support me, please register from my Referrals ==> http://adf.ly/?id=1068376
$api1 = "http://ouo.io/api/tyXTOWEv?s=";
$api2 = "http://api.adf.ly/api.php?key=1e3fb9932c55be71602b63704c7d471b&uid=4203994&advert_type=int&domain=adf.ly&url=";
$listfile = true;                # enable/disable all user can see list files.
$privatefile = false;        # enable/disable other people can see your file in the list files
$privateip = false;                # enable/disable other people can download your file.
$checkacc = true;                # enable/disable all user can use check accountSSDSCHMGCXHGCJM.
$checklinksex = false;        # enable/disable check link 3x,porn...

$modvnl = false;                # enable/disable login host for mod vinaleech
$debrid = true;        #enable/disable get link with debrid plugin
// $plugin = 'kingdebrid_com.php';                # file plugin alldebrid
//$plugin = 'alldebrid_com.php';                # file plugin conexaomega
// $plugin = 'downmasters_com.php';                # file plugin downmasters
// $plugin = 'ffdownloader_com.php';        # file plugin ffdownloader
// $plugin = 'linksnappy_com.php';                # file plugin linksnappy
// $plugin = 'multi-debrid_com.php';        # file plugin multi-debrid
// $plugin = 'premiumize_me.php';                # file plugin premiumize_me
// $plugin = 'real-debrid_com.php';                # file plugin real-debrid
// $plugin = 'rehost_to.php';                        # file plugin rehost_to
// $plugin = 'rpnet_biz.php';                        # file plugin rpnet_biz
 $plugin = 'simply-debrid_com.php';        # file plugin simply-debrid
// $plugin = 'superdown_com_br.php';        # file plugin superdown_com_br
// $plugin = 'superlinksbr_com.php';        # file plugin superlinksbr

$action = array(                # action with file in server files, set to true to enable, set to false to disable
'rename' => true,
'delete' => true,
);

# List of Bad Words, you can add more
$badword = array("porn","jav ", "Uncensored","xxx japan", "tora.tora", "tora-tora", "SkyAngle", "Sky_Angel", "Sky.Angel", "Incest","fuck", "Virgin", "PLAYBOY", "Adult", "tokyo hot", "Gangbang", "BDSM", "Hentai", "lauxanh", "homosexual", "bitch" , "Torture", "Nurse", "d?m d?ng", "c?c d?m", "phim c?p 3", "phim 18+", " Hentai", "Sex Videos", "Adult", "Adult XXX", "XXX movies", "Free Sex", "hardcore", "rape", "jav4u", "javbox", "jav4you", "akiba-online.com","JAVbest.ORG","X-JAV","cnnwe.com","J4v.Us","J4v.Us","teendaythi.com","entnt.com","khikhicuoi","sex-scandal.us","hotavxxx.com"); 


require_once ('languages.php');
?>
