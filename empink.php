<html>
<head>
	<title>ИНКАССАЦИЯ</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
   <link  rel="stylesheet" href="stylesheet.css">
   	<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">

<body class="first">
<body>
<center><font size="25">Служба безопасности</font></center>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" name="inkadd" method="GET"> 
			<font size="4">Дата:</font> <input type="date" name="date" class="second" size="50"> <br>
			<font size="4">Сумма:</font> <input type="text" name="sum" class="second" size="20"> <br>
			<font size="4">ФИО ответственного:</font> <input type="text" name="responsible" class="second" size="50">
			<br>
			<br>			
			<input name="submit" value="Добавить данные о инкассации" class="second" type="submit" >  
		</form>
		
<?php
		header( 'Content-Type: text/html; charset=utf-8' );
		if (isset($_GET['date'])) 
		{
			$hostname = "localhost"; 
			$username = "root"; 
			$password = ""; 
			$dbName = "security"; 
			$itemstable="inkas";
			$date="date";
			$sum="sum";
			$responsible="responsible";
			
			$cl_date = $_GET['date'];
			$cl_sum = $_GET['sum'];
			$cl_responsible = $_GET['responsible'];

			
			if (IS_NUMERIC($cl_sum))
			{
				$t=mysqli_connect("localhost","root","") OR DIE("Ошибка подключения"); 	
				
				mysqli_select_db($t,$dbName) or die(mysqli_error());  
				mysqli_set_charset( $t,'utf8' );
				
				$query = "INSERT INTO $itemstable VALUES ('$cl_date','$cl_sum','$cl_responsible')"; 
				mysqli_query($t,$query) or die(mysqli_error($t)); 
				$query = "SELECT date FROM $itemstable "; 
				$result = mysqli_query($t,$query) or die(mysqli_error());
				while ($row = mysqli_fetch_object($result)) {
					echo "<i>Данные добавлены</i>";
				}
				
				mysqli_close($t); 
			}
			else
				echo 'Сумма не может содержать буквы';
		}
		
		
		
		?>
		<p>
		<br>
<form align = "left" action ="empmenu.php" method = "post"> 
<input type="submit" name="menu" class="second" type="submit" value="Вернуться назад">
</form>
        </p>

        
		
		
		
	</body>
</html>