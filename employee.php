<html>
<head>
<title>Вход для сотрудников</title>
	
</head>
    <link  rel="stylesheet" href="stylesheet.css">
	<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
<body class="first">

<center><font size="25">Localll bank</font></center> 
 
Ввведите данные для входа:
<form method = "post"> 
<p>Введите логин: <input type="text" class="second" name = "loginn"/></p>
<p>Введите пароль: <input type="password" class="second" name = "passw" /></p>
<input type="submit" name = "pass" class="second"  type="submit" value="Войти в систему">
</form>

<?php



If (isset($_POST['loginn']))
{
$db = mysqli_connect("localhost","root","") or die ("Проверьте подключение к сети");
mysqli_select_db($db, "security") or die ("Подключение не установлено");

$result=mysqli_query($db, "SELECT login, password, department_id FROM employees") or die (mysqli_error());
$array = mysqli_fetch_array($result);

do{
$x = True;
$verifypasswd = password_verify($_POST['passw'],$array['password']); #Проверка пароля при помощи функции password_verify
IF ($_POST['loginn'] == $array['login'] && ($verifypasswd))
	{
		IF ($array['department_id'] == 1) 
			{
				header("Location: empmenu.php");
				$x=False;
			}
	}
}
while($array=mysqli_fetch_array($result));
If ($x = True)
{
	echo "Логин или пароль введены неверно. Введите данные повторно или обратитесь к администратору";
}
}
?>
<form align = "left" action ="index.php" method = "post"> 
<input type="submit" name="registration" class="second" type="submit" value="Вернуться на главную страницу"> 
</form>

</body>
</html>