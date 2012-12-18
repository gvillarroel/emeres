<div id="inicioSesion" >
    
    <form action="<? echo URL::site("Usuario/RecuperarClave") ?>" method="post" >
        <?
            echo Form::label(I18n::get("usuario.MAIL"));
            echo Form::input("MAIL", $usuario->MAIL , array("autofocus"));
            echo Form::submit("recuperar", I18n::get("Usuario.RecuperarClave.Recuperar"));
        ?>
    </form>
</div>