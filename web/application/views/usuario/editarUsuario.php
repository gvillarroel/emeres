<h2>Editar Usuario</h2>
<? echo Form::open("usuario/guardarUsuario") ?>

<table border="0">
    <thead>

    </thead>
    <tbody>
        <tr>
            <td><? echo Form::label("username", "Nombre de Usuario") ?></td>
            <td><? echo Form::input("usuario", $detalleUsuario) ?></td>
        </tr>
        <tr>
            <td><? echo Form::label("correo", "Correo Electronico") ?></td>
            <td><? echo Form::input("mail", $detalleCorreo) ?></td>
        </tr>
        <tr>
            <td><? echo Form::label("tipo", "Tipo") ?></td>
            <td>
                <select name="tipo">
                    <?
                    foreach ($detalleTipoUsuario as $tipo) {
                        echo "<option value='".$tipo->id."'>".$tipo->nombre."</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><? echo Form::label("mun", "Es Municipio"); ?></td>
            <td><? echo Form::checkbox("Check", null, true) ?></td>
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
?>