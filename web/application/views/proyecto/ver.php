<?php defined('SYSPATH') or die('No direct script access.'); ?>
<div style="margin: 20px 20px 30px 60px">
	<?php echo "<h1>Proyecto : ".$proyecto->NOMBRE_PROYECTO."</h1>"; ?>
	 <br>
	 <table border="1" cellpadding="4" cellspacing="0">
	 	<tr>
	 		<td>Nombre</td>
	 		<td><?php echo $proyecto->NOMBRE_PROYECTO; ?></td>
	 	</tr>
	 	<tr>
	 		<td>Descripcion</td>
	 		<td><?php echo $proyecto->DESCRIPCION_PROYECTO; ?></td>
	 	</tr>
	 	<tr>
	 		<td>Plan Estrategico</td>
	 		<td><?php echo $proyecto->ID_PLAN; ?></td>
	 	</tr>
	 	<tr>
	 		<td>Reponsable</td>
	 		<td><?php echo $proyecto->ID_USUARIO; ?></td>
	 	</tr>
	 	<tr>
	 		<td>Fecha Incio</td>
	 		<td><?php echo $proyecto->FECHA_INICIO_PROYECTO; ?></td>
	 	</tr>
	 	<tr>
	 		<td>Fecha Termino</td>
	 		<td><?php echo $proyecto->FECHA_TERMINO_PROYECTO; ?></td>
	 	</tr>
	 </table>
	 <br>
	 <br>
	 <?php 
		 echo HTML::anchor("proyecto/buscar/", "Volver"); 
		 echo " - ";
		 echo HTML::anchor("proyecto/editar/".$proyecto->ID_PROYECTO, "Editar");
	 ?>
	 <br>
	 <?php echo Request::factory('actividad/inicio/'.$proyecto->ID_PROYECTO)->execute() ?>
 </div>
 
