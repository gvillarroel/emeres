<?php defined('SYSPATH') or die('No direct script access.'); ?>
<div style="margin: 20px 20px 30px 60px">
	<h1>Busqueda de Proyectos</h1>
	<div class="busqueda">
	<?php echo Form::open('proyecto/multiple/', array('id' => 'formBusca')); ?>
	    <table width="500p" style="margin-left: 50px">
			<tr height="30px">
				<td colspan="4" align="right" "><?php echo HTML::anchor("proyecto/guardar/", "Nuevo Proyecto"); ?></td>
			</tr>
			<tr>
				<td>Criterio</td>
				<td><?php echo Form::select('criterio', $criterios); ?></td>	
				<td>Busqueda</td>
				<td><?php echo Form::input("palabraBusqueda", null, array('id' => 'palabraBusqueda')); ?></td>
			</tr>
			<tr>
				<td colspan="4" align="right"><?php echo Form::submit("submit", "Buscar"); ?></td>
			</tr>
			<?php echo Form::close(); ?>
	 </table>
	</div>
	<h2>Listado de Proyectos</h2>
	<div class="listado">
		<table border="1" cellspacing="0" cellpadding="3">
			<tr>
				<th>Id Proyecto</th>
				<th>Id Plan Estrategico</th>
				<th>Responsable</th>
				<th>Nombre proyecto</th>
				<th>Descripcion proyecto</th>
				<th>Fecha Inicio</th>
				<th>Fecha Termino</th>
				<th>Acci&oacute;n</th>
			</tr>
			<?php foreach ($proyectos as $proyecto) {
				echo"<tr>";
				echo "<td>".$proyecto->ID_PROYECTO."</td>";
				echo "<td>".$proyecto->ID_PLAN."</td>";
				echo "<td>".$proyecto->ID_USUARIO."</td>";
				echo "<td>".$proyecto->NOMBRE_PROYECTO."</td>";
				echo "<td>".$proyecto->DESCRIPCION_PROYECTO."</td>";
				echo "<td>".$proyecto->FECHA_INICIO_PROYECTO."</td>";
				echo "<td>".$proyecto->FECHA_TERMINO_PROYECTO."</td>";
				echo "<td>";
				echo HTML::anchor("proyecto/ver/".$proyecto->ID_PROYECTO, "Ver");
				echo " - ";
				echo HTML::anchor("proyecto/editar/".$proyecto->ID_PROYECTO, "Editar");
				echo " - ";
				echo HTML::anchor("proyecto/borrar/".$proyecto->ID_PROYECTO, "Borrar");
				echo "</td>";
				echo"</tr>";
			}
			?>
		</table>
	</div>
</div> 