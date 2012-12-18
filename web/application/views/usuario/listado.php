<div id="planDocumentos">
    <table id="grillaDocumentos"></table>
</div>
<script language="javascript" >
    jQuery("#grillaDocumentos").jqGrid({
	datatype: "local",
   	colNames:['N','Nombre', 'Fono', 'Email','Contacto'],
   	colModel:[
   		{name:'ID_USUARIO',index:'id', width:160, sorttype:"date"},
   		{name:'NOMBRES_USUARIO',index:'id', width:160, sorttype:"date"},
                {name:'FONO',index:'id', width:160, sorttype:"date"},
                {name:'MAIL',index:'id', width:160, sorttype:"date"},
                {name:'PERTENENCIA',index:'id', width:160, sorttype:"date"},
   	],
   	multiselect: false,
   	caption: 'Seleccione "Leer" para revisar el documento del plan estrat&eacute;gico'
});
var mydata = [
            <? foreach($usuarios as $usuario)
                echo json_encode($usuario->as_array()) . ","; ?>
		];
for(var i=0;i<=mydata.length;i++)
	jQuery("#grillaDocumentos").jqGrid('addRowData',i+1,mydata[i]);
</script>