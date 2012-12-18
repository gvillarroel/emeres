<div id="inicioSesion" >
    
    <form action="<? echo URL::site("Inicio/Sesion") ?>" method="post" >
        <?
            echo Form::label(I18n::get("usuario.nick"));
            echo Form::input("nick", $usuario->NICK , array("autofocus"));
            echo Form::label(I18n::get("usuario.clave"));
            echo Form::password("clave");
            echo Form::submit("entrar", I18n::get("inicio.sesion.entrar"));
            echo HTML::anchor("Usuario/RecuperarClave", I18n::get("inicio.sesion.recuperarClave"));
        ?>
    </form>
</div>