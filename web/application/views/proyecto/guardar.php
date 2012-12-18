<?php defined('SYSPATH') or die('No direct script access.'); ?>
<div style="margin: 20px 20px 30px 60px">
<h1>Crear Nuevo Proyecto</h1>
 
	<?php echo Form::open('proyecto/post/', array('id' => 'formProyecto')); ?>
    <table width="350px">
		<tr>
			<td width="150px"><?php echo Form::label("nombre", "Nombre"); ?></td>
			<td width="200px"><?php echo Form::input("NOMBRE_PROYECTO"); ?></td>
		</tr>
		<tr>
			<td><?php echo Form::label("descripcion", "Descripcion"); ?></td>
			<td><?php echo Form::input("DESCRIPCION_PROYECTO"); ?></td>
		</tr>
		<tr>
			<td><?php echo Form::label("idPlan", "Plan Estrategico"); ?></td>
			<td><?php echo Form::input("ID_PLAN"); ?></td>
		</tr>
		<tr>
			<td><?php echo Form::label("responsable", "Responsable"); ?></td>
			<td><?php echo Form::input("ID_USUARIO"); ?></td>
		</tr>
		<tr>
			<td><?php echo Form::label("fechaIni", "Fecha Inicio"); ?></td>
			<td><?php echo Form::input("FECHA_INICIO_PROYECTO", null, array('id' => 'IdFechaInicioPro')); ?></td>
		</tr>
		<tr>
			<td><?php echo Form::label("fechaTer", "Fecha Termino"); ?></td>
			<td><?php echo Form::input("FECHA_TERMINO_PROYECTO", null, array('id' => 'IdFechaTerminoPro')); ?></td>
		</tr>
		<tr>
			<td colspan="2" align="right" "><?php echo Form::submit("submit", "Guardar"); ?></td>
		</tr>
	</table>
	<?php echo Form::close(); ?>
	<?php echo HTML::anchor("proyecto/buscar/", "Volver"); ?>