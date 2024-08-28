<html>


<head>


    <META HTTP-EQUIV="EXPIRES" CONTENT="0">


</head>


<body>

Test curl result 4:<br/>

<?php
 // create a new cURL resource
$ch = curl_init();

// set URL and other appropriate options
curl_setopt($ch, CURLOPT_URL, "http://www.example.com/");
curl_setopt($ch, CURLOPT_HEADER, false);

// grab URL and pass it to the browser
if( curl_exec($ch) === false)
{
    echo 'Curl error: ' . curl_error($ch);
}
else
{
    echo 'Operation completed without any errors <br/>';
}
$response_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);
echo("response code:" . $response_code . "<br/>");
?>
<br/>
END.
</body>
</html>    