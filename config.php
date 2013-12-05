<?php

$mysql_hostname = "lgfanpage.db.11699024.hostedresource.com";  //your mysql host name
$mysql_user = "lgfanpage";			//your mysql user name
$mysql_password = "Lg@landing2013";			//your mysql password
$mysql_database = "lgfanpage";	//your mysql database

$bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Opps some thing went wrong");
mysql_select_db($mysql_database, $bd) or die("Error on database connection");










