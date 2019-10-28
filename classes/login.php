<?php 

header("Content-Type: text/html; charset=utf8");
require_once('dbh.php');

$dbh = new Dbh();

$name = $_POST["name"]; //取得login.html name & password
$password =$_POST["password"];


if($name && $password) //name password are not null
{

	$query = "SELECT * FROM users WHERE username = '{$name}' AND password = '{$password}'";
	$row_result=$dbh->login_data($query,$name,$password);
	
	
	
	if($row_result==true)
	{
		print_r($name);
        print_r($password);
		//echo"登入成功!";
		header("location:../create.php");
	}
	else
	{
		echo"密碼錯誤 登入失敗!";
	}
	

}





?>