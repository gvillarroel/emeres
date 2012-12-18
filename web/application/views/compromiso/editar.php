<?php defined('SYSPATH') or die('No direct script access.'); ?>
<div align="center">
	<?php echo "<h1>Editar Compromiso : ".$compromiso->NOMBRE_COMPROMISO."</h1>"; ?>
	<br>
	<?php echo Form::open('compromiso/update/'); ?>
	<?php echo Form::hidden("ID_COMPROMISO", $compromiso->ID_COMPROMISO);?>
	<table border="1">
		<tr>
			<td>Nombre del Compromiso</td>
			<td colspan="2"><?php echo Form::input("NOMBRE_COMPROMISO", $compromiso->NOMBRE_COMPROMISO); ?></td>
			<td><?php echo Form::submit("submit", "Editar"); ?></td>
		</tr>
		<tr>
			<td>Descripcion del Compromiso</td>
			<td colspan="2"><?php echo Form::input("DESCRIPCION_COMPROMISO", $compromiso->DESCRIPCION_COMPROMISO); ?></td>
			<td></td>
		</tr>
		<tr>
			<td>ID Responsable del Compromiso</td>
			<td colspan="2"><?php echo Form::input("ID_USUARIO", $compromiso->ID_USUARIO); ?></td>
			<td></td>
		</tr>
		<tr>
			<td>Fecha Incio (AAAA-MM-DD)</td>
			<td><?php echo Form::input("FECHA_INICIO_COMPROMISO", $compromiso->FECHA_INICIO_COMPROMISO, array('id' => 'idFechaInicioCompromiso')); ?></td>
			<td>Fecha Termino (AAAA-MM-DD)</td>
			<td><?php echo Form::input("FECHA_FIN_COMPROMISO", $compromiso->FECHA_FIN_COMPROMISO, array('id' => 'idFechaTerminoCompromiso')); ?></td>
		</tr>
		<tr>
			<td>Iniciativa</td>
			<td colspan="2"><?php echo Form::input("CORREL_INICIA", $compromiso->CORREL_INICIA); ?></td>
			<td></td>
		</tr>
		<tr>
			<td>Estado</td>
			<td ><?php echo Form::input("ESTADO_COMPROMISO", $compromiso->ESTADO_COMPROMISO); ?></td>
			<td colspan="2"></td>
		</tr>
	</table> 
	
	<?php echo Form::close(); ?> 
	<br>
	<br>
	<?php echo HTML::anchor("compromiso/buscar/", "Volver"); ?>
</div>