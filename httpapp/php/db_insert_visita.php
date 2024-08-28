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
    $stmt = $conn->prepare("INSERT INTO visitas (fecha_visita, fecha_fiesta, cliente, nota) VALUES ( :fecha_visita, :fecha_fiesta, :cliente, :nota)");
    $stmt->bindParam(':fecha_visita', $fecha_visita);
    $stmt->bindParam(':fecha_fiesta', $fecha_fiesta);
    $stmt->bindParam(':cliente', $cliente);
    $stmt->bindParam(':nota', $nota);

    // insert a row
    $fecha_visita = $_GET['fecha_visita'];;
    $fecha_fiesta = $_GET['fecha_fiesta'];;
	$cliente = $_GET['cliente'];;
	$nota = $_GET['nota'];;
    $stmt->execute();

    echo "New records created successfully";
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