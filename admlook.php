<html>
<head>
	<title>Все сотрудники</title>
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
		$itemstable="employees";
		$department_id="department_id";
		$initials="initials";
		$rank="rank";
		
		$t=mysqli_connect("localhost", "root", "") OR DIE("Ошибка подключения"); 
		mysqli_select_db($t,$dbName) or die(mysqli_error($t));  
		mysqli_set_charset($t,'utf8');
		
		$query = "SELECT * FROM $itemstable"; 
		$result = mysqli_query($t,$query) or die(mysqli_error());		

		echo '<table class="zebra"><caption></caption><tr><th><b>ФИО</b></th><th><b>Должность</b></th><th><b>ID отдела</b></th></tr></tr>';
		
		$query = "SELECT * FROM $itemstable"; 
		$result = mysqli_query($t,$query) or die(mysqli_error($t));
		
		 while ($row = mysqli_fetch_array($result))
		{
			echo '<tr align="center">
			<td><b>'.$row[0].'</b></td>
			<td>'.$row[1].'</td>
			<td>'.$row[3].'</td>';
		}
		?>
		<p>

<form align = "left" action ="adminmenu.php" method = "post"> 
<input type="submit" name="menu" class="second" type="submit" value="Вернуться назад">
</form>
        </p>
		
</body>


</html>	