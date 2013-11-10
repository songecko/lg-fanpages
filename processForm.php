<?php 

$register = $_POST['register'];
$fullname = $register['fullname'];
$email = $register['email'];
$phone = $register['phone'];
$day = $register['birthdate']['day'];
$month = $register['birthdate']['month'];
$year = $register['birthdate']['year'];
$birthdate = $year."-".$month."-".$day
$country = $register['country'];
$wants_newsletter = ($register['wants_newsletter']=='yes')?1:0;


//Guardado en base de datos
//$conexion = mysql_connect("lglanding.db.11699024.hostedresource.com", "lglanding", "Lg@landing2013");
$conexion = mysql_connect("localhost", "root", "");
mysql_select_db("lglanding", $conexion);
$sql= "INSERT INTO user(fullname, email, phone, birthdate, country, wants_newsletter) VALUES ('".$fullname."', '".$email."','".$phone."','".$birthdate."','".$country."', ".$wants_newsletter.")";
$saved = mysql_query($sql);

//Envio de email
if($saved)
{
	$destinatario = "alanmikahil.taveras@gmail.com"; 
	$asunto = "[LG Promo] Nuevo registro"; 
	$fechaNac = $day."-".$month."-".$year
	$cuerpo = ' 
	<html> 
	<head> 
	<title>LG Landing Promo</title> 
	</head> 
	<body> 
	<h2>Nuevo Registro</h2> 
	<p><b>Nombre y Apellido: </b> '.$fullname.'</p> 
	<p><b>Email: </b> '.$email.'</p> 
	<p><b>Fecha de Nacimiento: </b> '.$fechaNac.'</p>
	<p><b>Quiere adquirir nuevos modelos: </b>';
	
	$cuerpo .= ($wants_newsletter)?'Sí':'No';
	$cuerpo .= '</p>
	</body> 
	</html> 
	'; 

	//Envío en formato HTML 
	$headers = "MIME-Version: 1.0\r\n"; 
	$headers .= "Content-type: text/html; charset=utf-8\r\n"; 

	//Dirección del remitente 
	$headers .= "From: ".$fullname." <".$email.">\r\n"; 

	var_dump(mail($destinatario, $asunto, $cuerpo, $headers));
}

echo $saved;