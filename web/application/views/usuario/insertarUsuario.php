
<?

if (isset($error)) {
    $var = $error["nick"];
    foreach ($var[1] as $er) {
        echo "El nick " . $er . " ya está registrado.";
    }
    echo '<br/>';
    echo HTML::anchor("usuario/buscar", "Volver");
} else {
    echo '<h2>Datos Guardados</h2>';
    echo HTML::anchor("usuario/buscar", "Volver");
}
?>