<? 
    echo I18n::get("usuario.recuperaClaveMensaje.saludo") . " " . $usuario->nombre
?>
<br />
<?
    echo I18n::get("usuario.recuperaClaveMensaje.accion");
    echo HTML::anchor(URL::site("usuario/cambiarClave?codigo=$usuario->codigoActivacion&id=$usuario->id", "http", false), I18n::get("aquí"));
?>