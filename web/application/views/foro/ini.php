<p>Instrucciones para el foro</p>
<br/>
<br/>
<form action="http://localhost/foro/ucp.php?mode=login" method="post">
<input  type="hidden" name="username" size="25" value="<?php echo $user->nombre  ?>" tabindex="1" />  			
<input type="hidden" name="password" size="25" value="uEmJqI0j5StY" tabindex="2" />

<input type="hidden" name="redirect" value="http://localhost/foro/viewforum.php?f=4&t=4" />
<input type="submit" name="login" class="btnmain" value="Ingresar al Foro" tabindex="5" />

</form>
<?php
//echo "->".$usuario->nombre."<-";
//echo Form::label("usuario", I18n::get("base.menu.bienvenido")) . $usuario->nombre;
//echo $usuario;

//echo "b: ".$user->nombre;
//print_r(usuario);
?>