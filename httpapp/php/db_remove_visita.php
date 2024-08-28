<html>
<body>
 <?php
 //example http://www.laquintacumbres.com/php/db_insert_data.php?fecha=2017/04/08&inicio=10&fin=18&cliente=juan jose&nota=ya pago
$servername = "localhost";
$username = "raumen41_lqc";
$password = "mendozra";
$dbname = "raumen41_lqc";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // prepare sql and bind parameters
    $stmt = $conn->prepare("DELETE FROM visitas where id=:id");
    $stmt->bindParam(':id', $id);

    // insert a row
    $id = $_GET['id'];;
    $stmt->execute();

    echo "Registro borrado Exitosamente";
    }
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
$conn = null;
?> 



<a href="http://www.laquintacumbres.com/php/db_retrieve_visita.php" rel="external">regresar</a>
</body>
</html>