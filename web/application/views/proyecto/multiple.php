<?php defined('SYSPATH') or die('No direct script access.'); ?>
 
<?php 
echo "<h2>Criterio de busqueda: ".$cual." = ".$que."<h2>";
?>

<table border="1">
	<tr>
		<th>Id Proyecto</th>
		<th>Nombre Proyecto</th>
		<th>Descripcion Proyecto</th>
		<th>Plan Estrategico</th>
		<th>Responsable</th>
		<th>Fecha Inicio</th>
		<th>Fecha Termino</th>
		<th>Acci&oacute;n</th>
	</tr>
	<?php foreach ($proyectoBuscado as $proyecto) {
		echo"<tr>";
		echo "<td>".$proyecto->ID_PROYECTO."</td>";
		echo "<td>".$proyecto->NOMBRE_PROYECTO."</td>";
		echo "<td>".$proyecto->DESCRIPCION_PROYECTO."</td>";
		echo "<td>".$proyecto->ID_PLAN."</td>";
		echo "<td>".$proyecto->ID_USUARIO."</td>";
		echo "<td>".$proyecto->FECHA_INICIO_PROYECTO."</td>";
		echo "<td>".$proyecto->FECHA_TERMINO_PROYECTO."</td>";
		echo "<td>";
		echo HTML::anchor("proyecto/editar/".$proyecto->ID_PROYECTO, "Editar");
		echo "</td>";
		echo"</tr>";
	}
	?>
</table>
	 <br>
	 <br>
<?php echo HTML::anchor("proyecto/buscar/", "Volver"); ?>