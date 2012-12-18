<html>
    <head>
        <? if(isset($head)) echo $head ?>
        <? echo HTML::style("media/css/defecto.css"); ?>
        <? echo HTML::style("media/css/ui-lightness/jquery-ui-1.9.2.custom.css"); ?>
        <? echo HTML::style("media/css/ui.jqgrid.css"); ?>
        <? echo HTML::style("media/css/jTPS.css"); ?>
        <? echo html::script('media/js/jquery-1.8.3.js'); ?>
        <? echo html::script('media/js/jquery-ui-1.9.2.custom.js'); ?>
        <? echo html::script('media/js/jquery.jqGrid.min.js'); ?>
        <? echo html::script('media/js/i18n/grid.locale-es.js'); ?>
        <? echo html::script('media/js/i18n/jTPS.js'); ?>
       	<?php if(isset($styles)) foreach ($styles as $style) echo html::style($style);?> 
        <?php if(isset($scripts)) foreach ($scripts as $file) echo HTML::script($file), PHP_EOL ?> 
        
        
    </head>
    <body>
        <div class="principal" >
            <div class="usuario">
                <? echo Form::label("usuario", I18n::get("base.menu.bienvenido")) . $usuario->NICK; ?>
                <? echo Html::image("media/imagenes/cerrar.png", array("class" => "boton", "onclick"=>"javascript:location.href='".URL::site("Inicio/CerrarSesion")."'")); ?>
            </div>
            <?
            if (isset($errors) && count($errors) > 0)
            {
                echo '<ul>';
                foreach ($errors as $error)
                {
                    echo "<li>$error</li>";
                }
                echo '</ul>';
            }
            ?>
            
            <div class="menu">
                <ul class="menuUsuario">
                <?
                    foreach ($links->as_array() as $link)
                    {
                        if($link->ID_LINK_PADRE == NULL)
                        {
                            echo "<li>";
                            if($link->LINK != NULL)
                                echo HTML::anchor ($link->LINK, I18n::get ($link->TEXTO));
                            else
                                echo I18n::get ($link->TEXTO);
                            echo "</li>";
                            
                            echo "<ul>";
                            foreach($links as $sublink)
                            {
                                if($sublink->ID_LINK_PADRE == $link->ID_LINK)
                                    echo "<li>".HTML::anchor ($sublink->LINK, I18n::get ($sublink->TEXTO))."</li>";
                            }
                            echo "</ul>";
                        }
                    }
                ?>
                </ul>
            </div>
            <div class="body">
                <? if(isset($body)) echo $body ?>
            </div>
        </div>
    </body>
</html>