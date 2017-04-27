<html xmlns="http://www.w3.org/1999/xhtml">


<head>


	<META HTTP-EQUIV="EXPIRES" CONTENT="0">


</head>


<body>


	Credit Card <br>

	time:time:<? echo date(DATE_RFC822) ?>
	
	php version:<? echo phpversion() ?>

	Result of operation <br>
<?
require_once("/home/www/poolandparty.com/conekta-php-master/lib/Conekta.php");
Conekta::setApiKey('1tv5yJp3xnVZ7eK67m4h');
try {
  $charge = Conekta_Charge::create(array(
    "amount"=> 51000,
    "currency"=> "MXN",
    "description"=> "Pizza Delivery",
    "reference_id"=> "orden_de_id_interno",
    "card"=> $_POST['conektaTokenId']
    //"tok_a4Ff0dD2xYZZq82d9"
  ));
} catch (Conekta_Error $e) {
  echo $e->getMessage();
  //El pago no pudo ser procesado
}
?>

<br>
END.
</body>
</html>