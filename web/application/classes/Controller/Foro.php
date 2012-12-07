<?php

class Controller_Foro extends Controller {
    
    public function action_ini()
    {
        if(!Session::instance()->GetUsuario())
            return $this->redirect("/");

        $links = new Model_Link();
  $usuario = new Model_Usuario();

        $template = View::factory("base/menu");
        $template->set("usuario", Session::instance()->GetUsuario());
        $template->set("links", $links->ObtenerLinks(Session::instance()->GetUsuario()));
        $template->body = View::factory("foro/ini");
	
	$template->body->set("user",Session::instance()->GetUsuario());


        $this->response->body($template);
	


		//return $this->redirect("http://localhost/foro/viewforum.php?f=3");

		//return $this->redirect("http://localhost/foro/ucp.php?mode=login&username=cesar&password=cesar1234");

		$vars["username"]="cesar";
		$vars["password"]="cesar1234";
		//echo $foro->sendpost("http://localhost/foro/ucp.php?mode=login",$vars,"http://localhost/foro");
		//echo $foro->sendpost("http://localhost/foro/ucp.php?mode=login",$vars,"http://localhost/foro/viewforum.php?f=3");
		//echo $foro->sendpost("http://localhost/foro/ucp.php?mode=login",$vars,"http://localhost/foro/ucp.php?mode=login");

		//return $this->redirect("http://localhost/foro/viewforum.php?f=3");


    }



	public function sendpost($direccion,$variables, $referido="") {
	   global $_SERVER;
	//Desarmamos la URL definida en $dirección
	   $infodeurl=parse_url($direccion);
	//En caso de que el parametro $referido no este definido, que coloque el documento actual
	   if($referido=="") $referido=$_SERVER["SCRIPT_URI"];
	//Desglosamos las variables que se van a enviar
	   foreach($variables as $key=>$valor)
	    $valores[]=$key."=".urlencode($valor);
	//Convertimos las Variables desglosadas en una cadena de consulta
	   $datos=implode("&",$valores);
	//En caso de que el puerto no esté definido en la url, utilizaremos por defecto el puerto 80
	   if(!isset($infodeurl["port"]))  $infodeurl["port"]=80;
	//Creamos la Data que se enviara por medio del socket
	   $retorno.="POST ".$infodeurl["path"]." HTTP/1.1\n";
	   $retorno.="Host: ".$infodeurl["host"]."\n";
	   $retorno.="Referer: $referer\n";
	   $retorno.="Content-type: application/x-www-form-urlencoded\n";
	   $retorno.="Content-length: ".strlen($datos)."\n";
	   $retorno.="Connection: close\n";
	   $retorno.="\n";
	//incluimos las variables en la data
	   $retorno.=$datos."\n";
	//Conectamos al dominio especificado en la URL
	   $fp = fsockopen($infodeurl["host"],$infodeurl["port"]);
	//le enviamos los datos
	   fputs($fp, $retorno);
	//Sacamos el resultado linea a linea
	   while(!feof($fp))
	   {
	      $resultado .= fgets($fp, 128);
	   }
	//Cerramos la conexión con el servidor
	   fclose($fp);
	//Y retornamos los datos.
	   return $resultado;
}

    
}

?>