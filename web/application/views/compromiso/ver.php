<?php defined('SYSPATH') or die('No direct script access.'); ?>
<div align="center">
	<?php echo "<h1>compromiso : ".$compromiso->nombrecompromiso."</h1>"; ?>
	 <br>
	 <table border="1">
	 	<tr>
	 		<td>Nombre</td>
	 		<td><?php echo $compromiso->nombrecompromiso; ?></td>
	 	</tr>
	 	<tr>
	 		<td>ID Reponsable</td>
	 		<td><?php echo $compromiso->fkUsuario; ?></td>
	 	</tr>
	 	<tr>
	 		<td>Fecha Incio</td>
	 		<td><?php echo $compromiso->fechaIniciocompromiso; ?></td>
	 	</tr>
	 	<tr>
	 		<td>Fecha Termino</td>
	 		<td><?php echo $compromiso->fechaTerminocompromiso; ?></td>
	 	</tr>
	 </table>
	 <br>
	 <br>
	 <?php 
		 echo HTML::anchor("compromiso/buscar/", "Volver"); 
		 echo " - ";
		 echo HTML::anchor("compromiso/editar/".$compromiso->idcompromiso, "Editar");
	 ?>
	 <br>
	 <?php echo Request::factory('actividad/inicio/'.$compromiso->idcompromiso)->execute() ?>
 </div>
 
