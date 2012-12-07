<html>
    <head>
        <? if(isset($head)) echo $head ?>
        <? echo HTML::style("media/css/defecto.css"); ?>
    </head>
    <body>
        <div class="principal" >
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
            
            <? echo $body ?>
        </div>
    </body>
</html>