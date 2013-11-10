<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
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
        <div class="container">
            <div id="content">
				<form action="#" method="post">
					<div class="fullname">
						<label for="fullname">Nombre y apellidos:</label>
						<input type="text" name="register[fullname]" id="fullname" />
					</div>
					<div class="email">
						<label for="email">E-mail:</label>
						<input type="text" name="register[email]" id="email" />
					</div>
					<div class="phone">
						<label for="phone">Telefono:</label>
						<input type="text" name="register[phone]" id="phone" />
					</div>
					<div class="date">
						<label>Fecha de nacimiento:</label>
						<select class="day" type="text" name="register[birthdate][day]">
							<?php for($i=1;$i<31;$i++):?>
								<option value="<?php echo $i ?>"><?php echo $i ?></option>
							<?php endfor; ?>
						</select>
						<select class="month" type="text" name="register[birthdate][month]" >
							<option>Enero
							</option>
						</select>
						<select class="year" type="text" name="register[birthdate][year]"  >
							<?php for($i=1940;$i<2013;$i++):?>
								<option value="<?php echo $i ?>"><?php echo $i ?></option>
							<?php endfor; ?>
						</select>
					</div>
					<div class="country">
						<label for="country">Pais:</label>
						<input type="text" name="register[country]" id="country" />
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
						<input type="checkbox" name="register[accept]"><label>He leído y acepto los términos y condiciones</label>
					</div>
					<p id="message"></p>
					<button type="submit" class="pull-right"><img src="images/registerButton.png" alt="Reglas" /></button>	
				</form>
            </div>
        </div>

        <script src="js/vendor/jquery-1.9.1.min.js"></script>
        <script src="js/vendor/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>