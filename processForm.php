<?php 

header("Content-Type: text/html;charset=utf-8");

require 'vendor/facebook/facebook.php';

$facebook = new Facebook(array(
		'appId'  => '207375499424489',
		'secret' => '2531bd11ac41bec9a11cec3ccf485f69',
		'cookie' => true
));

// Get User ID
$user = $facebook->getUser();

echo "Facebook user id: ".$user;

$register = $_POST['register'];
$fullname = $register['fullname'];
$email = $register['email'];
$phone = $register['phone'];
$day = $register['birthdate']['day'];
$month = $register['birthdate']['month'];
$year = $register['birthdate']['year'];
$birthdate = $year."-".$month."-".$day;
$country = $register['country'];
$wants_newsletter = ($register['wants_newsletter']!='')?1:0;


//Guardado en base de datos
$conexion = mysql_connect("lgfanpage.db.11699024.hostedresource.com", "lgfanpage", "Lg@landing2013");
//$conexion = mysql_connect("localhost", "root", "123456");
mysql_select_db("lgfanpage", $conexion);
mysql_query("SET NAMES 'utf8'");
$sql= 'INSERT INTO user(fullname, email, phone, birthdate, country, wants_newsletter) VALUES ("'.$fullname.'", "'.$email.'","'.$phone.'","'.$birthdate.'","'.$country.'", "'.$wants_newsletter.'")';
$saved = mysql_query($sql);

//Envio de email
if($saved)
{
	$destinatario = "zinia.english@lge.com";
	$asunto = "[LG Promo] Nuevo registro"; 
	$fechaNac = $day."-".$month."-".$year;
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

	//var_dump(mail($destinatario, $asunto, $cuerpo, $headers));
	
	if($user)
	{
		try {
			$ret_obj = $facebook->api('/me/feed', 'POST',
					array(
							'link' => 'http://www.lg.com/pa/telefonos-celulares/lg-G2-D805',
							'message' => 'Estoy participado en la promoción de LG para ganarme un #LGG2 todas las semanas, tú también puedes participar. Visita: http://on.fb.me/17OMbeI.'
					));
		} catch(FacebookApiException $e) {
			echo($e->getType());
			echo($e->getMessage());
		}
	}
}

echo var_dump($saved);