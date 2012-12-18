<?php defined('SYSPATH') or die('No direct script access.'); ?>
<div style="margin: 20px 20px 30px 60px">
<h1>Crear Nueva Actividad</h1>

	<?php echo Form::open('actividad/post/', array('id' => 'formActividad')); ?>
	<?php echo Form::hidden("ID_PROYECTO", $ID_PROYECTO);?>
     <table width="400px">
		<tr>
			<td><?php echo Form::label("nombre", "Nombre de Actividad"); ?></td>
			<td><?php echo Form::input("NOMBRE_ACTIVIDAD"); ?></td>
		</tr>
		<tr>
			<td><?php echo Form::label("descripcion", "Descripcion de Actividad"); ?></td>
			<td><?php echo Form::input("DESCRIPCION_ACTIVIDAD"); ?></td>
		</tr>
		<tr>
			<td><?php echo Form::label("fechaIni", "Fecha Inicio"); ?></td>
			<td><?php echo Form::input("FECHA_INICIO_ACTIVIDAD", null, array('id' => 'IdFechaInicioPro')); ?></td>
		</tr>
		<tr>
			<td><?php echo Form::label("fechaTer", "Fecha Termino"); ?></td>
			<td><?php echo Form::input("FECHA_TERMINO_ACTIVIDAD", null, array('id' => 'IdFechaTerminoPro')); ?></td>
		</tr>
		<tr>
			<td><?php echo Form::label("estado", "Estado de Actividad"); ?></td>
			<td><?php echo Form::input("ESTADO_ACTIVIDAD"); ?></td>
		</tr>
		<tr>
			<td colspan="2" align="right"><?php echo Form::submit("submit", "Guardar"); ?></td>
		</tr>
	</table>	  
	<?php echo Form::close(); ?>
	<?php echo HTML::anchor("proyecto/ver/".$ID_PROYECTO, "Volver"); ?>
</div>