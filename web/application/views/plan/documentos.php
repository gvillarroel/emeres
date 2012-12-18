<div id="planDocumentos">
    <table id="grillaDocumentos"></table>
</div>
<script language="javascript" >
    jQuery("#grillaDocumentos").jqGrid({
	datatype: "local",
   	colNames:['Fecha','Descripci&oacute;n', 'Acci&oacute;n'],
   	colModel:[
   		{name:'FECHA_DOC_PLAN',index:'id', width:160, sorttype:"date"},
   		{name:'DESCRIPCION_DOC_PLAN',index:'invdate', width:590},
   		{name:'ACCION',index:'name', width:200},
   	],
   	multiselect: false,
   	caption: 'Seleccione "Leer" para revisar el documento del plan estrat&eacute;gico'
});
var mydata = [
            <? foreach($documentos as $documento)
                echo json_encode($documento->as_array()) . ","; ?>
		];
for(var i=0;i<=mydata.length;i++)
	jQuery("#grillaDocumentos").jqGrid('addRowData',i+1,mydata[i]);
</script>