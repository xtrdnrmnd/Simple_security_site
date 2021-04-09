<html>
<head>
	<title>Администрирование</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
   <link  rel="stylesheet" href="stylesheet.css">
   	<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">

<body class="first">
<body>
<center><font size="25">Служба безопасности</font></center>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" name="admadd" method="GET"> 
			<font size="4">ФИО:</font> <input type="text" name="initials" class="second" size="50"> <br>
			<font size="4">Должность:</font> <input type="text" name="rank" class="second" size="50"> <br>
			<font size="4">ID:</font> <input type="text" name="id" class="second" class="second" size="50"> <br>
			<font size="4">ID отдела</font> <input type="text" name="department_id" class="second" size="50"> <br>
			<font size="4">Логин:</font> <input type="text" name="login" class="second" size="30"><br>
			<font size="4">Пароль:</font> <input type="text" name="password" class="second" size="30">
			<br>
			<br>			
			<input name="submit" value="Добавить сотрудника в базу" class="second" type="submit" >  
		</form>
		
<?php
		header( 'Content-Type: text/html; charset=utf-8' );
		if (isset($_GET['initials'])) 
		{
			$hostname = "localhost"; 
			$username = "root"; 
			$password = ""; 
			$dbName = "security"; 
			$itemstable="employees";
			$initials="initials";
			$rank="rank";
			$id="id";
			$department_id="department_id";
			$login="login";
			$password="password";
			$cl_initials = $_GET['initials'];
			$cl_rank = $_GET['rank'];
			$cl_id = $_GET['id'];
			$cl_department_id = $_GET['department_id'];
			$cl_login = $_GET['login'];
			$cl_password = $_GET['password'];
			if ((IS_NUMERIC($cl_password)) && (IS_NUMERIC($cl_id)))
			{
				$hash=password_hash($cl_password, PASSWORD_DEFAULT); #Хэширование паролей

				$t=mysqli_connect("localhost","root","") OR DIE("Ошибка подключения"); 	
				
				mysqli_select_db($t,$dbName) or die(mysqli_error());  
				mysqli_set_charset( $t,'utf8' );
				
				$query = "INSERT INTO $itemstable VALUES ('$cl_initials','$cl_rank','$cl_id','$cl_department_id','$cl_login', '$hash')"; 
				mysqli_query($t,$query) or die(mysqli_error($t)); 
				$query = "SELECT id FROM $itemstable WHERE $initials='$cl_initials'"; 
				$result = mysqli_query($t,$query) or die(mysqli_error());
				while ($row = mysqli_fetch_object($result)) {
					echo "<i>Сотрудник <b>$cl_initials</b> был добавлен в БД под номером <b>$cl_id</b>.</i>";
				}
				
				mysqli_close($t); 
			}
			else
				echo 'Проверьте правильность введенных данных';
		}
		
		
		
		?>
		<p>
		<br>
<form align = "left" action ="adminmenu.php" method = "post"> 
<input type="submit" name="menu" class="second" type="submit" value="Вернуться назад">
</form>
        </p>

        
		
		
		
	</body>
</html>