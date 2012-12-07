<div id="inicioSesion" >
    
    <form action="<? echo URL::site("Inicio/Sesion") ?>" method="post" >
        <?
            echo Form::label(I18n::get("usuario.correoElectronico"));
            echo Form::input("correoElectronico", $usuario->correoElectronico , array("autofocus"));
            echo Form::label(I18n::get("usuario.clave"));
            echo Form::password("clave");
            echo Form::submit("entrar", I18n::get("inicio.sesion.entrar"));
            echo HTML::anchor("Usuario/RecuperarClave");
        ?>
    </form>
</div>