<?php defined('SYSPATH') or die('No direct script access.'); ?>
<div style="margin: 20px 20px 30px 60px">
	<?php echo "<h1>Borrar Proyecto : ".$proyecto->NOMBRE_PROYECTO."</h1>"; ?>
 
	<?php echo Form::open('proyecto/delete/'); ?>
	<?php echo Form::hidden("ID_PROYECTO", $proyecto->ID_PROYECTO);?>
	<table>
		<tr>
			<td><?php echo Form::label("plan", "Plan Estrategico"); ?></td>
			<td><?php echo Form::label("ID_PLAN", $proyecto->ID_PLAN); ?></td>
		</tr>
		<tr>
			<td><?php echo Form::label("nombre", "Nombre"); ?></td>
			<td><?php echo Form::label("NOMBRE_PROYECTO", $proyecto->NOMBRE_PROYECTO); ?></td>
		</tr>
		<tr>
			<td><?php echo Form::label("descripcion", "Descripcion"); ?></td>
			<td><?php echo Form::label("DESCRIPCION_PROYECTO", $proyecto->DESCRIPCION_PROYECTO); ?></td>
		</tr>
		<tr>
			<td><?php echo Form::label("responsable", "Responsable"); ?></td>
			<td><?php echo Form::label("ID_USUARIO", $proyecto->ID_USUARIO); ?></td>
		</tr>
		<tr>
			<td><?php echo Form::label("fechaIni", "Fecha Inicio"); ?></td>
			<td><?php echo Form::label("FECHA_INICIO_PROYECTO", $proyecto->FECHA_INICIO_PROYECTO); ?></td>
		</tr>
		<tr>
			<td><?php echo Form::label("fechaTer", "Fecha T&eacute;rmino"); ?></td>
			<td><?php echo Form::label("FECHA_TERMINO_PROYECTO", $proyecto->FECHA_TERMINO_PROYECTO); ?></td>
		</tr>
		<tr>
			<td colspan="2" align="right""><?php echo Form::submit("submit", "Borrar"); ?></td>
		</tr>
	</table>
	<?php echo Form::close(); ?> 
	<?php echo HTML::anchor("proyecto/buscar/", "Volver"); ?>
</div> 