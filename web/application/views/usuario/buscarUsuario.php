<h2>Buscar Usuario</h2>

<?php
echo Form::open("usuario/buscar");
?>

<table border="0">
    <thead>
        
    </thead>
    <tbody>
        <tr>
            <td><? echo Form::label("nombre usuario", "Nombre Usuario")?></td>
            <td><? echo Form::input("username")?></td>
            <td><? echo Form::submit("nuevo", "Nuevo")?></td>
        </tr>
        <tr>
            <td><? echo Form::label("tipo", "Tipo")?></td>
            <td><? echo Form::select("tipos" , Array("1" => "Emeres", "2" =>"Socio"))?></td>
            <td><? echo Form::submit("buscar", "Buscar")?></td>
        </tr>
    </tbody>
    <tfoot>
        
    </tfoot>
</table>

<?echo Form::close()?>



<table border="1">
	<thead>
		<tr>
			<th>Nombre</th>
			<th>Tipo</th>
                        <th>Editar</th>
		</tr>
	</thead>
	<tbody>
                <?
                foreach ($usuarios as $tipo) {
                    ?><tr>
			<td><?php echo $tipo->NOMBRES_USUARIO; ?></td>
			<td><?php 
                                if ($tipo->ID_TIPO_USUARIO == '1'){
                                    echo "Emeres"; 
                                } else {
                                    echo "Socio";
                                }
                     ?></td>
                        <td><a href="<?php echo $tipo->ID_USUARIO; ?>">Editar</a></td>
                    </tr><?php
                }
                ?>            		
	</tbody>
<!--	<tfoot class="nav">
		<tr>
			<td colspan="2">
				<div class="pagination"></div>
				<div class="paginationTitle"></div>
				<div class="selectPerPage"></div>
				<div class="status"></div>
			</td>
		</tr>
	</tfoot>-->
</table>