 <?php
 //example http://www.laquintacumbres.com/php/db_insert_data.php?fecha=2017/04/08&inicio=10&fin=18&cliente=juan jose&nota=ya pago
$servername = "localhost";
$username = "raumen41_lqc";
$password = "mendozra";
$dbname = "raumen41_lqc";

try
{
	$id =$_GET['id'];
	
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // prepare sql and bind parameters
    $stmt = $conn->prepare("SELECT id, fecha, inicio, fin, cliente, nota FROM reservaciones where id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();

	$result = $stmt->fetch();
	$fecha = $result["fecha"];
	$inicio = $result["inicio"];
	$fin = $result["fin"];
	$cliente = $result["cliente"];
	$nota = $result["nota"];
	
}
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }


?>

<h2>Editar una reservacion</h2>

<form method="get" action="http://www.laquintacumbres.com/php/db_update_data.php" >  
  <input type="hidden" name="id" value="<?php echo $id; ?>">
  fecha: <input type="text" name="fecha" value="<?php echo $fecha; ?>">
  <br><br>
  inicio: <input type="text" name="inicio" value="<?php echo $inicio; ?>">
  <br><br>
  fin: <input type="text" name="fin" value="<?php echo $fin; ?>">
  <br><br>
  cliente: <input type="text" name="cliente" value="<?php echo $cliente; ?>">
  <br><br>
  nota: <input type="text" name="nota" rows="6" cols="50" value="<?php echo $nota; ?>">
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<a href="http://www.laquintacumbres.com/php/logout.php">logout</a>