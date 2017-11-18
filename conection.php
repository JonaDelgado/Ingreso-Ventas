<?php

$db = 'ventas';
$host = 'localhost';
$user = 'root';
$pass = '';

try{
	$conn = new PDO("mysql:dbname=".$db.";host=".$host,$user, $pass);
	$conn->query("SET NAMES 'utf8'");
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOExeption $e){


}
?>