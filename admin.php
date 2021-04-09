<html>
<head>
<title>Администрирование</title>	
</head>
    <link  rel="stylesheet" href="stylesheet.css">
<body class="first">
<center><font size="25"> Localll bank</font></center> 
<center><font size="25">Служба безопасности</font></center> 
Данная страница предназначена только для администратора службы безопасности<br>
<p>Для входа введите логин и пароль: </p>
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
$result=mysqli_query($db, "SELECT login, password FROM admin") or die (mysqli_error());
$array = mysqli_fetch_array($result);
do{
$x = True;
IF ($_POST['loginn'] == $array['login'] && $_POST['passw'] == $array['password'])
	{
		header("Location: adminmenu.php");
		$x=False;
	}
}
while($array=mysqli_fetch_array($result));
If ($x = True)
{
	echo "Логин или пароль введены неверно. Введите данные повторно";
}
}
?>
<form align = "left" action ="index.php" method = "post"> 
<input type="submit" name = "employee" class="second"  type="submit" value="Вернуться назад">
</form>
</body>
</html>