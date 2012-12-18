<? 
    echo I18n::get("usuario.recuperaClaveMensaje.saludo") . " " . $usuario->NOMBRES_USUARIO;
?>
<br />
<?
    echo I18n::get("usuario.recuperaClaveMensaje.accion");
    echo HTML::anchor(URL::site("usuario/cambiarClave?codigo=$usuario->CODIGO_ACTIVACION&id=$usuario->ID_USUARIO", "http", false), I18n::get("aquí"));
?>