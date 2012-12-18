<?php defined('SYSPATH') or die('No direct script access.'); ?>

<h1>Buscar compromisos</h1>
<div class="busqueda" align="center">
	<?php echo Form::open('compromiso/multiple/'); ?>
	<table>
		<tr>
				<td>Criterio</td>
				<td><?php echo Form::select('criterio', $criterios); ?></td>	
				<td>Busqueda</td>
				<td><?php echo Form::input("palabraBusqueda", null, array('id' => 'palabraBusqueda')); ?></td>
			</tr>
			<tr>
				<td colspan="4" align="right"><?php echo Form::submit("submit", "Buscar"); ?></td>
			</tr>
		<tr>
			<td colspan="4" align="right" "><?php echo HTML::anchor("compromiso/nuevo/", "Nuevo Compromiso"); ?></td>
		</tr>
	</table>
	<?php echo Form::close(); ?>
	<br>
    <br>
</div>
<div class="listado">
	<table border="1">
		<tr>
			<th>Id Compromiso</th>
			<th>Nombre compromiso</th>
			<th>Descripcion compromiso</th>
			<th>Responsable</th>
			<th>Iniciativa</th>
			<th>Estado</th>
			<th>Fecha Inicio</th>
			<th>Fecha Termino</th>
			<th>Acci&oacute;n</th>
		</tr>
		<?php foreach ($compromisos as $compromiso) {
			echo"<tr>";
			
			echo "<td>".$compromiso->ID_COMPROMISO."</td>";
			echo "<td>".$compromiso->NOMBRE_COMPROMISO."</td>";
			echo "<td>".$compromiso->DESCRIPCION_COMPROMISO."</td>";
			echo "<td>".$compromiso->ID_USUARIO."</td>";
			echo "<td>".$compromiso->CORREL_INICIA."</td>";
			echo "<td>".$compromiso->ESTADO_COMPROMISO."</td>";
			echo "<td>".$compromiso->FECHA_INICIO_COMPROMISO."</td>";
			echo "<td>".$compromiso->FECHA_FIN_COMPROMISO."</td>";
			echo "<td>";
			echo HTML::anchor("compromiso/editar/".$compromiso->ID_COMPROMISO, "Editar");
			//echo " - ";
			//echo HTML::anchor("compromiso/ver/".$compromiso->idCompromiso, "Ver");
			echo "</td>";
			echo"</tr>";
		}
		?>
	</table>
</div>