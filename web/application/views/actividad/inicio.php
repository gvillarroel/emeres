<?php defined('SYSPATH') or die('No direct script access.'); ?>
<div align="center">
	<?php echo "<h2>Actividades</h2>"; ?>
<table border="1" cellpadding="4" cellspacing="0">
	<tr>
		<th>Numero de actividad</th>
		<th>Nombre de actividad</th>
		<th>Descripcion de actividad</th>
		<th>Fecha Inicio</th>
		<th>Fecha Termino</th>
		<th>Estado</th>
		<th>Acci&oacute;n</th>
	</tr>
	<?php 
		foreach ($actividades as $actividad) {
			echo"<tr>";
			echo "<td>".$actividad->CORREL_ACTIVIDAD."</td>";
			echo "<td>".$actividad->NOMBRE_ACTIVIDAD."</td>";
			echo "<td>".$actividad->DESCRIPCION_ACTIVIDAD."</td>";
			echo "<td>".$actividad->FECHA_INICIO_ACTIVIDAD."</td>";
			echo "<td>".$actividad->FECHA_TERMINO_ACTIVIDAD."</td>";
			echo "<td>".$actividad->ESTADO_ACTIVIDAD."</td>";
			echo "<td>";
			echo Form::open('actividad/editar/', array('id' => 'formBusca'));
			echo Form::hidden("ID_PROYECTO", $actividad->ID_PROYECTO);
			echo Form::hidden("CORREL_ACTIVIDAD", $actividad->CORREL_ACTIVIDAD);
			echo Form::submit("submit", "Editar"); 
			echo Form::close();
			echo Form::open('actividad/borrar/', array('id' => 'formBusca'));
			echo Form::hidden("ID_PROYECTO", $actividad->ID_PROYECTO);
			echo Form::hidden("CORREL_ACTIVIDAD", $actividad->CORREL_ACTIVIDAD);
			echo Form::submit("submit", "Borrar"); 
			echo Form::close();
			echo "</td>";
			echo"</tr>";
		}
	?>
</table>
	 <br>
	 <br>
	 <?php 
		 echo HTML::anchor("proyecto/buscar/", "Volver"); 
		 echo " - ";
		 echo HTML::anchor("actividad/nuevo/".$ID_PROYECTO, "Nueva Actividad");
	 ?>
 </div>