<?php 
session_start();
include "lang.php";	


if($_GET["exit"])
{ 
    session_destroy();
    header("Location: ses.php");
}

if ($_GET["lang"]) 
{	
	$_SESSION['lang'] = $_GET["lang"];
}

if (!isset($_SESSION["role"]))
{
    header("Location: ses.php");
}

?>
	
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Клиент</title>
</head>
<body>

<form method="GET">
	<input type="submit" name="exit"  value="<?php echo $translate[$_SESSION['lang']]['exit']; ?>">
</form>
<p>  
	<?php 
	echo $translate[$_SESSION['lang']]['hello'];
	echo ", ";
	echo $_SESSION['name'];
	echo " ";
	echo $_SESSION['surname'];
	echo ". ";
	echo $translate[$_SESSION['lang']][$_SESSION['role']]; 
	?>    
</p>
<form >
	<select name="lang" method="GET">
		<option value="<?php $_SESSION['lang']; ?>"><?php echo $translate[$_SESSION['lang']]['lan']; ?></option>
		<option value="ru">Russian</option>
		<option value="uk">Ukrainian</option>
		<option value="en">English</option>
	</select>
	<input type="submit" value="<?php echo $translate[$_SESSION['lang']]['save']; ?>">
</form>

<h2><?php echo $translate[$_SESSION['lang']]['menu'];?>  </h2>

<?php 	if ($_SESSION['role'] == 'admin') 
{ ?>
<a href="admin.php"><?php echo $translate[$_SESSION['lang']]['admin_menu']; ?></a> <br><br><br>
<? } 
?>
<?php 	if ($_SESSION['role'] == 'manager' || $_SESSION['role'] == 'admin' ) 
{ ?>
<a href="manager.php"><?php echo $translate[$_SESSION['lang']]['manager_menu']; ?></a> <br><br><br>
<? } ?>

<b><a href="client.php" class="cur_menu"><?php echo $translate[$_SESSION['lang']]['client_menu']; ?></a></b>
<br><br><br><br><br><br>	<br><br><br>
</body>
</html>