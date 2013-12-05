<?php
include('config.php');    //include of db config file

$result = mysql_query("SELECT * FROM user");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <style type="text/css">
.logo
{
    text-align: center;
}
</style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="logo">
                    <img src="images/logo.png"/> 
                </a>
            </div>
        </div>
        <div class="row">
            <div>
                <div class="mini-layout"> 
					<div><a href="descargaExcel.php?result=$result ">Descargar Excel</a></div>
                    <table class='table table-bordered'>
						<tr>
							<th>Nombre y Apellido</th> 
							<th>Email</th>
							<th>Telefono</th> 
							<th>Fecha de Nacimiento</th>
							<th>Pais</th>
							<th>Quiere Novedades?</th>
						</tr>
					<?php while($fila = mysql_fetch_array($result, MYSQL_ASSOC)){ ?>
							<tr>
							<td><?php echo utf8_encode($fila["fullname"]) ?></td>
							<td><?php echo $fila["email"] ?></td>
							<td><?php echo $fila["phone"] ?></td>
							<td><?php echo date("d/m/Y", strtotime($fila["birthdate"])); ?></td>
							<td><?php echo $fila["country"] ?></td>
							<td><?php if($fila["wants_newsletter"]==1): echo("SI"); else: echo("NO"); endif;  ?></td>
							</tr>
					<?php }  ?>  		 
					</table>           
				</div>
			</div>
		</div>
	</div>
</body>
</html>