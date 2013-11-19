<?php
	require 'vendor/facebook/facebook.php';

	$facebook = new Facebook(array(
		'appId'  => '207375499424489',
		'secret' => '2531bd11ac41bec9a11cec3ccf485f69',
		'cookie' => true
	));

	$login_url = $facebook->getLoginUrl(array(
			'scope' => 'publish_stream',
			//'redirect_uri' => 'https://tresepic.com/clients/lg/fanpages/?redirectfp=pr'
			//'redirect_uri' => 'https://www.facebook.com/pages/Testing/140839539432205?id=140839539432205&sk=app_207375499424489'
	));
	// Get User ID
	$user = $facebook->getUser();
		
	if(!$user) 
	{
		
		echo "<html>
				<head>
					<script type='text/javascript'>	top.location.href = '".$login_url."';</script>
				</head>
				<body></body>
			  </html>";
        exit;
	}
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>LG Landing</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-responsive.min.css">
        <link rel="stylesheet" href="css/main.css">
        <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>        
    </head>
    <body>
        <div class="container mainContainer" style="display:none;">
            <div id="content">
				<form action="#" method="post">
					<div class="fullname">
						<label for="fullname">Nombre y apellidos:</label>
						<input type="text" name="register[fullname]" id="fullname" />
					</div>
					<div class="email">
						<label for="email">E-mail:</label>
						<input type="text" name="register[email]" id="email" />
						<img src="images/candado.png" alt="Candado">
					</div>
					<div class="phone">
						<label for="phone">Teléfono:</label>
						<input type="text" name="register[phone]" id="phone" />
					</div>
					<div class="date">
						<label>Fecha de nacimiento:</label>
						<select class="day" type="text" name="register[birthdate][day]">
							<?php for($i=1;$i<=31;$i++):?>
								<option value="<?php echo $i ?>"><?php echo $i ?></option>
							<?php endfor; ?>
						</select>
						<select class="month" type="text" name="register[birthdate][month]" >
							<option value="01">Enero</option>
							<option value="02">Febrero</option>
							<option value="03">Marzo</option>
							<option value="04">Abril</option>
							<option value="05">Mayo</option>
							<option value="06">Junio</option>
							<option value="07">Julio</option>
							<option value="08">Agosto</option>
							<option value="09">Septiembre</option>
							<option value="10">Octubre</option>
							<option value="11">Noviembre</option>
							<option value="12">Diciembre</option>
						</select>
						<select class="year" type="text" name="register[birthdate][year]"  >
							<?php for($i=1940;$i<=2013;$i++):?>
								<option value="<?php echo $i ?>"><?php echo $i ?></option>
							<?php endfor; ?>
						</select>
					</div>
					<div class="country">
						<label for="country">Pais:</label>
						<select type="text" name="register[country]" id="country" />
							<option value="Panama">Panama</option>
							<option value="Costa Rica">Costa Rica</option>
							<option value="Rep. Dominicana">Rep. Dominicana</option>
							<option value="Puerto Rico">Puerto Rico</option>
						</select>
					</div>				
					
					<p class="question">¿Eres de los que le gusta adquirir los nuevos modelos de celulares antes que los demás?</p>
					<div class="field-row clearfix">
						<input type="radio" name="register[wants_newsletter][]" id="wants_newsletter_yes" checked />
						<label for="wants_newsletter_yes">Sí</label>
					</div>
					<div class="field-row clearfix">
						<input type="radio" name="register[wants_newsletter][]" id="wants_newsletter_no" />
						<label for="wants_newsletter_no">No</label>
					</div>
					<h4>Términos y condiciones</h4>
					<div class="terminos">						
						<input type="checkbox" name="register[accept]" id="accept"><label>He leído y acepto los <a href="reglas-oficiales.pdf" target="_blank">términos y condiciones</a></label>
					</div>
					<p id="message"></p>
					<div class="registerButton">
						<button type="submit"><img src="images/registerButton.png" alt="Reglas" /></button>
					</div>		
				</form>
				<!-- Modal -->
				<div class="modal fade" id="myModalDone" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				  <div class="modal-dialog">
					<div class="modal-content">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="myModalLabel">Datos enviados correctamente</h4>
					  </div>
					  <div class="modal-body">
						 Gracias por participar.
					  </div>
					</div><!-- /.modal-content -->
				  </div><!-- /.modal-dialog -->
				</div><!-- /.modal -->
				<div class="modal fade" id="myModalError" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				  <div class="modal-dialog">
					<div class="modal-content">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="myModalLabel">Error en envio de formulario</h4>
					  </div>
					  <div class="modal-body">
						 Debes completar correctamente todos los campos.
					  </div>
					</div><!-- /.modal-content -->
				  </div><!-- /.modal-dialog -->
				</div><!-- /.modal -->
				<a href="https://twitter.com/livinglg" target="_blank" class="twButton"><img src="images/twButton.png"></a>
            </div>
        </div>

        <script src="js/vendor/jquery-1.9.1.min.js"></script>
        <script src="js/vendor/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
        <script type="text/javascript">
        	$(document).ready(function()
			{
        		if (window.self === window.top) 
            	{
                	window.location = 'https://www.facebook.com/pages/Testing/140839539432205?id=140839539432205&sk=app_207375499424489';
            	}else
            	{
                	$('.mainContainer').show();
            	}
            });
    		
		</script>
    </body>
</html>