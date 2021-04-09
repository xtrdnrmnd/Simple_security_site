<html>
<head>
	<title>Удаление сотрудников</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
   <link  rel="stylesheet" href="stylesheet.css">

<body class="first">	
<body>
<center><font size="25">Служба безопасности</font></center>  
		<br>
		<br>
	 <form align = "left" action ="adminmenu.php" method = "post"> 
	 <input name="menu" class="second" type="submit" value="Вернуться назад">
	 </form>
		<font size="5">Выберите сотрудника для удаления:</font> 
		<form action="<?=$_SERVER['PHP_SELF']?>" method="post" >
		<select name="user"  class="second" size=1>
		
<?php
		header( 'Content-Type: text/html; charset=utf-8' );
		
		
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
			
		$t=mysqli_connect("localhost","root","") OR DIE("Ошибка подключения"); 
		mysqli_select_db($t,$dbName) or die(mysqli_error());  
		mysqli_set_charset( $t,'utf8' );
		
		$query = "SELECT $id, $initials FROM $itemstable"; 
		$result = mysqli_query($t,$query) or die(mysqli_error());
		
		while ($row = mysqli_fetch_object($result)) {
			echo '<option value="'.  $row->id . '">'. $row->initials . '</option>';
		}
		echo '</select><br><input class="second" type="submit" value="Удалить" /><br>';
		
		if (isset($_POST['user']))
		{
			$user = $_POST['user'];

			$query ="DELETE FROM $itemstable WHERE $id=$user";
			mysqli_query($t,$query) or die(mysqli_error($t)); 
			echo '<i> Сотрудник <b>',$user,'</b> удален.</i> <br />';	
			 mysqli_close($t);
		}		

	?>		
	</body>
</html>