<h2>Editar Usuario</h2>
<? echo Form::open("usuario/guardarUsuario") ?>

<table border="0">
    <thead>

    </thead>
    <tbody>
        <tr>
            <td><? echo Form::label("nombre", "Nombre") ?></td>
            <td><? echo Form::input("nombre", $detalleNombre) ?></td>
        </tr>
        <tr>
            <td><? echo Form::label("apellido", "Apellido") ?></td>
            <td><? echo Form::input("apellido", $detalleApellido) ?></td>
        </tr>
                <tr>
            <td><? echo Form::label("nick", "Nick") ?></td>
            <td><? echo Form::input("nick", $detalleNick) ?></td>
        </tr>
        <tr>
            <td><? echo Form::label("fono", "Teléfono") ?></td>
            <td><? echo Form::input("fono", $detalleFono) ?></td>
        </tr>
                <tr>
            <td><? echo Form::label("pertenencia", "Pertenencia") ?></td>
            <td><? echo Form::input("pertenencia", $detallePertenencia) ?></td>
        </tr>
        <tr>
            <td><? echo Form::label("mail", "Correo Electronico") ?></td>
            <td><? echo Form::input("mail", $detalleCorreo) ?></td>
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
        </tr>
        <tr>
            <td><? echo HTML::anchor("usuario/cambiarClave", "Cambiar Clave") ?></td>
            <td><? echo Form::submit("guardar", "Guardar"); ?></td>
        </tr>
    </tbody>
    <tfoot>

    </tfoot>

</table>

<? echo Form::close();

if(isset($error)){
    echo '<h2>Error</h2>';
    echo 'El nick '.$error.' ya está usado. Debe utilizar uno diferente.';
}
?>