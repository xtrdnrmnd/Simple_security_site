<html>
<head>
	<title>Сеанс</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
   <link  rel="stylesheet" href="stylesheet.css">
   	<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">

<body class="first">
<body>
<center><font size="25">Служба безопасности</font></center>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" name="empadd" method="GET"> 
			<font size="4">ID сотрудника:</font> <input type="text" name="id" class="second" size="50"> <br>
			<font size="4">Дата:</font> <input type="date" name="date" class="second" size="50"> 
			
			<br>
			<br>			
			<input name="submit" value="Добавить данные о посетителе" class="second" type="submit" >  
		</form>
		
<?php
		header( 'Content-Type: text/html; charset=utf-8' );
		if (isset($_GET['id'])) 
		{
			$hostname = "localhost"; 
			$username = "root"; 
			$password = ""; 
			$dbName = "security"; 
			$itemstable="visitors";
			$id="id";
			$date="date";
			
			$cl_id = $_GET['id'];
			$cl_date = $_GET['date'];
			
			if (IS_NUMERIC($cl_id))
			{
				$t=mysqli_connect("localhost","root","") OR DIE("Ошибка подключения"); 	
				
				mysqli_select_db($t,$dbName) or die(mysqli_error());  
				mysqli_set_charset( $t,'utf8' );
				
				$query = "INSERT INTO $itemstable VALUES ('$cl_id','$cl_date')"; 
				mysqli_query($t,$query) or die(mysqli_error($t)); 
				$query = "SELECT id FROM $itemstable WHERE $id='$cl_id'"; 
				$result = mysqli_query($t,$query) or die(mysqli_error());
				while ($row = mysqli_fetch_object($result)) {
					echo "<i>Данные добавлены</i>";
				}
				
				mysqli_close($t); 
			}
			else
				echo 'Проверьте правильность введенных данных';
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