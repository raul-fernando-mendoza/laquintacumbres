<!DOCTYPE html> 
<html> 
<head> 
<title>My Page</title> 
<meta name="viewport" content="width=device-width, initial-scale=1"> 
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
<link rel="stylesheet" href="jw-jqm-cal.css" />
<script type="text/javascript" src="jw-jqm-cal.js"></script>
<script type="text/javascript">
 $(document).on("pageinit", "#view-calendar", function () { 
   $("#calendar").jqmCalendar({
      events : [ 
<?php
$servername = "localhost";
$username = "raumen41_lqc";
$password = "mendozra";
$dbname = "raumen41_lqc";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, fecha, inicio, fin, cliente, nota FROM reservaciones where fecha >= DATE(CURDATE()) order by fecha";
$result = $conn->query($sql);

setlocale(LC_ALL, "es_ES", 'Spanish_Spain', 'Spanish');

$i = 0;   
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $dayofweek = date('w', strtotime($row["fecha"]) );
        if( $i++ > 0){ echo ",";};
        echo '{';
		echo '"id":' . $row["id"] . ",";
        echo '"summary":"Lástima, te la ganaron :(",' ;
        echo '"begin":new Date(' . iconv('ISO-8859-2', 'UTF-8', strftime("%Y,%m-1,%d", strtotime($row['fecha']))) . "," . $row["inicio"] . ",0)," ;
        echo '"end":new Date(' . iconv('ISO-8859-2', 'UTF-8', strftime("%Y,%m-1,%d", strtotime($row['fecha']))) . "," . $row["fin"] . ",0)";
        echo '}';

    }
    echo "],";
} else {
    echo "0 results";
}


$conn->close();
?>
      months : ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octobre", "Noviembre", "Diciembre"],
      days : ["Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab"],
      startOfWeek : 0
   });
   
   
	$("#calendar").bind('change', function(event, date) {
		// Fetch the events from the jqm-calendar object stored in the jQuery data
		var events = $("#calendar").data("jqm-calendar").settings.events;
		// Check if any events on this date exist
		for ( var i = 0; i < events.length; i++ ) {
			if ( events[i].begin.getFullYear() == date.getFullYear() && // same year?
				 events[i].begin.getMonth() == date.getMonth() &&        // same month?
				 events[i].begin.getDate() == date.getDate() ) {        // same date?
				  // There is an event!
				 $("#message").html('');
				 return false;
			}
		}
		// There is no event!
		var options = {
			weekday: "long"
		};

		 $("#message").html('<p><strong>Si la quieres la puedes tener el '+ date.toLocaleDateString("es", options) +', llama al 81-80168013</strong></p>');
	});
   
})



</script>

</head> 
<body> 

<div data-role="page" id="view-calendar" data-theme="c">


<div data-role="header">
<h1><a href="http://www.laquintacumbres.com" data-ajax="false">La Quinta Cumbres</a></h1>
</div>

<div data-role="content">
<div id="calendar"></div>
<div name="message" id="message"></div>
</div>






</body>
</html>