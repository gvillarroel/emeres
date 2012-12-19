<h2>Buscar Usuario</h2>

<?php
echo Form::open("usuario/buscar");
?>

<table border="0">
    <thead>
        
    </thead>
    <tbody>
        <tr>
            <td><? echo Form::label("nombre usuario", "Nombre Usuario") ?></td>
            <td><? echo Form::input("username") ?></td>
            <td><? echo HTML::anchor("usuario/nuevoUsuario", "Nuevo") ?></td>
        </tr>
        <tr>
            <td><? echo Form::label("tipo", "Tipo") ?></td>
            <td>
                <select name="tipo">
                    <?
                    foreach ($detalleTipoUsuario as $tipo) {
                        echo "<option value='" . $tipo->ID_TIPO_USUARIO . "'>" . $tipo->DESCRIPCION_TIPO_USUARIO . "</option>";
                    }
                    ?>
                </select>
            </td>
            <td><? echo Form::submit("buscar", "Buscar") ?></td>
        </tr>
    </tbody>
    <tfoot>
        
    </tfoot>
</table>

<?echo Form::close()?>



<table border="1">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Teléfono</th>
            <th>Correo</th>
            <th>Pertenencia</th>
            <th>Nick</th>
            <th>Tipo</th>
            <th>Editar</th>
        </tr>
    </thead>
    <tbody>
        <?
        foreach ($usuarios as $tipo) {
            ?><tr>
                <td><?php echo $tipo["NOMBRES_USUARIO"]; ?></td>
                <td><? echo $tipo["APELLIDOS_USUARIO"] ?></td>
                <td><? echo $tipo["FONO"] ?></td>
                <td><? echo $tipo["MAIL"] ?></td>
                <td><? echo $tipo["PERTENENCIA"] ?></td>
                <td><? echo $tipo["NICK"] ?></td>
                <td><?php
            switch ($tipo["ID_TIPO_USUARIO"]) {
                case '1':
                    echo "Emeres";
                    break;
                case '2':
                    echo "Socio";
                    break;
                case '3':
                    echo 'Municipio';
                    break;
                case '4':
                    echo 'Empresa';
                    break;
            }
            ?></td>
                <td>
    <? echo HTML::anchor("usuario/editarUsuario/" . $tipo["ID_USUARIO"], "Editar") ?>
                </td>
            </tr><?php
}
?>            		
    </tbody>
<!--	<tfoot class="nav">
		<tr>
			<td colspan="2">
				<div class="pagination"></div>
				<div class="paginationTitle"></div>
				<div class="selectPerPage"></div>
				<div class="status"></div>
			</td>
		</tr>
	</tfoot>-->
</table>
