<?php defined('SYSPATH') or die('No direct script access.'); ?>
 
<?php 
echo "<h2>Criterio de busqueda: ".$cual." = ".$que."<h2>";
?>
<table border="1">
	<tr>
		<th>ID compromiso</th>
		<th>ID del Responsable</th>
		<th>Nombre del Compromiso</th>
		<th>Fecha Inicio</th>
		<th>Fecha Termino</th>
		<th>Descripci&oacute;n del Comprmiso</th>
		<th>Iniciativa</th>
		<th>Estado del compromiso</th>
		<th>Acci&oacute;n</th>
	</tr>
	<?php foreach ($compromisoBuscado as $compromiso) {
		echo"<tr>";
		echo "<td>".$compromiso->ID_COMPROMISO."</td>";
		echo "<td>".$compromiso->ID_USUARIO."</td>";
		echo "<td>".$compromiso->NOMBRE_COMPROMISO."</td>";
		echo "<td>".$compromiso->FECHA_INICIO_COMPROMISO."</td>";
		echo "<td>".$compromiso->FECHA_FIN_COMPROMISO."</td>";
		echo "<td>".$compromiso->DESCRIPCION_COMPROMISO."</td>";
		echo "<td>".$compromiso->CORREL_INICIA."</td>";
		echo "<td>".$compromiso->ESTADO_COMPROMISO."</td>";
		echo "<td>";
		echo HTML::anchor("compromiso/editar/".$compromiso->ID_COMPROMISO, "Editar");
		echo "</td>";
		echo"</tr>";
	}
	?>
</table>
	 <br>
	 <br>
<?php echo HTML::anchor("compromiso/buscar/", "Volver"); ?>



