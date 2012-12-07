<div id="cambiarClave" >
    <form method="post" >
        <?php
            echo Form::hidden("id", $usuario->id);
            echo Form::hidden("codigo", $usuario->codigoActivacion);
            echo Form::label("clave", I18n::get("usuario.clave"));
            echo Form::password("clave",NULL, array("autofocus"));
            echo Form::label("claveRevision", I18n::get("usuario.claveRevision"));
            echo Form::password("claveRevision");
            echo Form::submit("cambiar", I18n::get("usuario.cambiarClave.cambiar"));
        ?>
    </form>
</div>