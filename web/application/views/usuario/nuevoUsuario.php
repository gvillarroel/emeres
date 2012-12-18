<h2>Nuevo Usuario</h2>
<? echo Form::open("usuario/insertarUsuario") ?>

<table border="0">
    <thead>

    </thead>
    <tbody>
        <tr>
            <td><? echo Form::label("nombre", "Nombre") ?></td>
            <td><? echo Form::input("nombre", "") ?></td>
        </tr>
        <tr>
            <td><? echo Form::label("apellido", "Apellido") ?></td>
            <td><? echo Form::input("apellido", "") ?></td>
        </tr>
        <tr>
            <td><? echo Form::label("nick", "Nick") ?></td>
            <td><? echo Form::input("nick", "") ?></td>
        </tr>
        <tr>
            <td><? echo Form::label("clave", "Contraseña") ?></td>
            <td><? echo Form::password("clave", "") ?></td>
        </tr>
        <tr>
            <td><? echo Form::label("fono", "Teléfono") ?></td>
            <td><? echo Form::input("fono", "") ?></td>
        </tr>
        <tr>
            <td><? echo Form::label("pertenencia", "Pertenencia") ?></td>
            <td><? echo Form::input("pertenencia", "") ?></td>
        </tr>
        <tr>
            <td><? echo Form::label("mail", "Correo Electronico") ?></td>
            <td><? echo Form::input("mail", "") ?></td>
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
            <td></td>
            <td><? echo Form::submit("guardar", "Guardar"); ?></td>
        </tr>
    </tbody>
    <tfoot>

    </tfoot>

</table>

<? echo Form::close();
?>
