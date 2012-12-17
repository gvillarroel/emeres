<div id="cambiarClave" >
    <form method="post" >
        <?php
            echo Form::hidden("id", $usuario->ID_USUARIO);
            echo Form::hidden("codigo", $usuario->CODIGO_ACTIVACION);
            echo Form::label("clave", I18n::get("usuario.clave"));
            echo Form::password("clave",NULL, array("autofocus"));
            echo Form::label("claveRevision", I18n::get("usuario.claveRevision"));
            echo Form::password("claveRevision");
            echo Form::submit("cambiar", I18n::get("usuario.cambiarClave.cambiar"));
        ?>
    </form>
</div>