<!DOCTYPE html> 
<html> 
<head> 
<title>Visitas</title> 
<meta name="viewport" content="width=device-width, initial-scale=1"> 
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
<link rel="stylesheet" href="jw-jqm-cal.css" />

<link rel="stylesheet" type="text/css" href="../datetimepicker/build/jquery.datetimepicker.min.css"/>
<style type="text/css">

.custom-date-style {
	background-color: red !important;
}

.input{	
}
.input-wide{
	width: 500px;
}


</style>

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

$sql = "SELECT id, fecha_fiesta, fecha_visita, cliente, nota FROM visitas where fecha_visita >= DATE(CURDATE()) order by fecha_visita";
$result = $conn->query($sql);

setlocale(LC_ALL, "es_ES", 'Spanish_Spain', 'Spanish');

$i = 0;   
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $dayofweek = date('w', strtotime($row["fecha_visita"]) );
        if( $i++ > 0){ echo ",";};
        echo '{';
		echo '"id":' . $row["id"] . ",";
        echo '"summary":" cita:' . iconv('ISO-8859-2', 'UTF-8', strftime("%A, %d de %B", strtotime($row['fecha_visita']))). " cliente:" . $row["cliente"] . " fiesta:" . iconv('ISO-8859-2', 'UTF-8', strftime("%A, %d de %B", strtotime($row['fecha_fiesta']))). ' nota:'  . $row["nota"] . '",' ;
		echo '"begin":new Date(' . iconv('ISO-8859-2', 'UTF-8', strftime("%Y,%m-1,%d", strtotime($row['fecha_visita']))) . "," . iconv('ISO-8859-2', 'UTF-8', strftime("%H", strtotime($row['fecha_visita'])))  .  ",".  iconv('ISO-8859-2', 'UTF-8', strftime("%M", strtotime($row['fecha_visita']))) . "),";
        echo '"end":new Date(' . iconv('ISO-8859-2', 'UTF-8', strftime("%Y,%m-1,%d", strtotime($row['fecha_visita']))) . "," . iconv('ISO-8859-2', 'UTF-8', strftime("%H", strtotime($row['fecha_visita']))) .  ",".   iconv('ISO-8859-2', 'UTF-8', strftime("%M", strtotime($row['fecha_visita']))) . "),";
        echo '}';

    }
}
echo "],";


$conn->close();
?>
      months : ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
      days : ["Su", "Mo", "Tu", "We", "Th", "Fr", "Sa"],
      startOfWeek : 0
   });
   
   
	$("#calendar").bind('change', function(event, date) {
		// Fetch the events from the jqm-calendar object stored in the jQuery data
		var events = $("#calendar").data("jqm-calendar").settings.events;
		var eventFound = false;
		$("#message").html('');
		
		// Check if any events on this date exist
		for ( var i = 0; i < events.length; i++ ) {
			if ( events[i].begin.getFullYear() == date.getFullYear() && // same year?
				 events[i].begin.getMonth() == date.getMonth() &&        // same month?
				 events[i].begin.getDate() == date.getDate() ) {        // same date?
				  // There is an event!
				 $("#message").append('<table width="100%"><tr><td><a href="http://www.laquintacumbres.com/php/db_remove_visita.php?id=' + events[i].id + '" rel="external">Remove</a>' + 
				 '<td/><td>' + events[i].summary + '</td><td><a href="http://www.laquintacumbres.com/php/db_edit_visita.php?id=' + events[i].id + '" rel="external">Edit</a></td></table></br>');
				 eventFound = true;
			}
		}
		// There is no event!
		var options = {
			weekday: "long",
			year: "numeric",
			month: "long",
			day: "numeric"
		};
        if(false == eventFound){
			$("#message").html('No hay visitas para el dia:'+ date.toLocaleDateString("es", options) +' </strong></p>');
		}	
		return false;
	});
   
})



</script>

</head> 
<body> 

<div data-role="page" id="view-calendar" data-theme="c">


<div data-role="header">
<h1><a href="http://www.laquintacumbres.com" data-ajax="false">La Quinta Cumbres</a></h1>
<h1><a href="http://www.laquintacumbres.com/php/db_retrieve_data.php" data-ajax="false">Reservaciones</a></h1>
</div>

<div data-role="content">
<div id="calendar"></div>
<div name="message" id="message"></div>
</div>


<h2>Crear una visita</h2>

<form method="get" action="http://www.laquintacumbres.com/php/db_insert_visita.php" >  
  fecha visita: <input type="text" name="fecha_visita" id="fecha_visita" value="">
  <br><br>
  fecha de interes: <input type="text" name="fecha_fiesta" value="2017/01/31">
  <br><br>
  nombre de cliente: <input type="text" name="cliente" value="">
  <br><br>
  nota: <input type="text" name="nota" rows="6" cols="50"></input>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<a href="http://www.laquintacumbres.com/php/logout.php" data-ajax="false">logout</a>

<script src="../datetimepicker/build/jquery.datetimepicker.full.js"></script>
<script>
$.datetimepicker.setLocale('en');

$('#fecha_visita').datetimepicker({
	inline:true,
	value:'2017/06/11 12:00'
});
</script>

</body>
</html>