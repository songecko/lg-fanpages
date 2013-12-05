<?php
include('config.php');    //include of db config file

$result = mysql_query("SELECT * FROM user");

header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=registros.xls");
header("Pragma: no-cache");
header("Expires: 0");

?>

<html>
	<table>
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
				<td><?php echo $fila["fullname"] ?></td>
				<td><?php echo $fila["email"] ?></td>
				<td><?php echo $fila["phone"] ?></td>
				<td><?php echo $fila["birthdate"] ?></td>
				<td><?php echo $fila["country"] ?></td>
				<td><?php if($fila["wants_newsletter"]==1): echo("SI"); else: echo("NO"); endif;  ?></td>
				</tr>
		<?php }  ?>  		 
	</table>  
</html>