<?php
function Connection() {
	$dbhost="localhost";
	$dbuser="oropeza";
	$dbpass="0r0p3z4";
	$dbname="escuela";
	$con = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
	$con -> exec("set names utf8");
	$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	return $con;
}
?>
