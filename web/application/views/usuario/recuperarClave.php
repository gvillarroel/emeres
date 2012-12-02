<div id="inicioSesion" >
    
    <form action="<? echo URL::site("Usuario/RecuperarClave") ?>" method="post" >
        <?
            echo Form::label(I18n::get("usuario.correoElectronico"));
            echo Form::input("correoElectronico", $usuario->correoElectronico , array("autofocus"));
            echo Form::submit("recuperar", I18n::get("Usuario.RecuperarClave.Recuperar"));
        ?>
    </form>
</div>