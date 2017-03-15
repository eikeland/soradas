<?php
	/*Eiksdesign Mysql Config*/
	$db_host = "soradas.no.mysql";
	$db_database = "soradas_no";
	$db_user = "soradas_no";
	$db_password = "xpcsoradas@22";
	$con = mysql_connect($db_host,$db_user,$db_password);
	mysql_select_db($db_database,$con);
	$link = mysqli_connect($db_host,$db_user,$db_password,$db_database);
?>