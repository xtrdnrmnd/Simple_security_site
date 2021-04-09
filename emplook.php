<html>
<head>
	<title>Все посещения</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
   <link  rel="stylesheet" href="stylesheet.css">
   	<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">

<body class="first">	
<body>

<center><font size="25">Служба безопасности</font></center>  		
<?php
		
	header( 'Content-Type: text/html; charset=utf-8' );
		$hostname = "localhost"; 
		$username = "root"; 
		$password = ""; 
		$dbName = "security"; 
		$itemstable="visitors";
		$id="id";
		$date="date";
		
		$t=mysqli_connect("localhost", "root", "") OR DIE("CON ERROR "); 
		mysqli_select_db($t,$dbName) or die(mysqli_error());  
		mysqli_set_charset($t,'utf8');
		
		$query = "SELECT * FROM $itemstable"; 
		$result = mysqli_query($t,$query) or die(mysqli_error());
		
		
		echo '<table class="zebra"><caption></caption><tr><th><b>ID</b></th><th><b>Дата</b></th></tr></tr>';
		
		$query = "SELECT * FROM $itemstable"; 
		$result = mysqli_query($t,$query) or die(mysqli_error());
		
		 while ($row = mysqli_fetch_array($result))
		{
			echo '<tr align="center">
			<td><b>'.$row[0].'</b></td>
			<td>'.$row[1].'</td>';
		}
		?>
		<p>

<form align = "left" action ="empmenu.php" method = "post"> 
<input type="submit" name="menu" class="second" type="submit" value="Вернуться назад">
</form>
        </p>
		
</body>


</html>	