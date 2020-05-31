<?php 
session_start();

$login = $_POST['login'];
$password = $_POST['password'];



$users = 
[
['login' => 'Vasisualiy', 'name'=>'Василий', 'surname'=>'Лоханкин', 'password' => '12345', 'lang' => 'ru', 'role'=>'admin'],
['login' => 'Afanasiy','name'=>'Афанасий', 'surname'=>'Цукерберг', 'password' => '54321', 'lang' => 'en', 'role'=>'client'],
['login' => 'Petro', 'name'=>'Петр', 'surname'=>'Инкогнито', 'password' => 'EkUC42nzmu', 'lang' => 'uk', 'role'=>'manager'],
['login' => 'Pedrolus', 'name'=>'Педро','surname'=>'Миланов', 'password' => 'Cogito_ergo_sum', 'lang' => 'en','role'=>'client'],
['login' =>'Sasha', 'name'=>'Александр', 'surname'=>'Александров', 'password' => 'Ignorantia_non_excusat', 'lang' => 'ru', 'role'=>'manager'],
];

for ($i=0; $i < count($users); $i++) 
{ 
	if ( ($users[$i]['login'] == $login) && ($users[$i]['password'] == $password) ) 
	{	
		$counter++;

		$_SESSION['log'] = $users[$i]['login'];
		$_SESSION['pass'] = $users[$i]['password'];
		$_SESSION['name'] = $users[$i]['name'];
		$_SESSION['surname'] = $users[$i]['surname'];
		$_SESSION['lang'] = $users[$i]['lang'];
		$_SESSION['role'] = $users[$i]['role'];

			if ($users[$i]['role'] == 'admin') 
			{
				header('Location: admin.php');
			}

			if ($users[$i]['role'] == 'client') 
			{
				header('Location: client.php');
			}

			if ($users[$i]['role'] == 'manager') 
			{
				header('Location: manager.php');
			}

		break;
	}
}

if ($counter == 0) 
{
	$_SESSION['mess'] = 'Такого пользователя не существует';    
	header('Location: index.php');
}

?>