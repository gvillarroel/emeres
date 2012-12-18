$(document).ready(function() {
	
  $.validator.setDefaults({
	onkeyup: false
      });
      
  $("#formProyecto").validate({
	  rules: {
	    NOMBRE_PROYECTO: {
	      required: true
	    },
	    DESCRIPCION_PROYECTO: {
	      required: true
	    },
	    ID_PLAN: {
	      required: true
	    },
	    ID_USUARIO: {
	      required: true
	    },
	    FECHA_INICIO_PROYECTO: {
	      required: true
	    },
	    FECHA_TERMINO_PROYECTO: {
	      required: true
	    }
	  },
	  messages: {
	    NOMBRE_PROYECTO: {
	      required: "Debe ingresar un nombre"
	    },
	    DESCRIPCION_PROYECTO: {
	      required: "Debe ingresar una descripcion"
	    },
	    ID_USUARIO: {
	      required: "Debe ingresar un usuario"
	    },
	    ID_PLAN: {
	      required: "Debe ingresar un plan estrategico"
	    },
	    FECHA_INICIO_PROYECTO: {
	      required: "Debe ingresar una fecha de inicio"
	    },
	    FECHA_TERMINO_PROYECTO: {
	      required: "Debe ingresar una fecha de t&eacute;rmino"
	    }
	  }
	});
	
	$("#formActividad").validate({
	  rules: {
	    NOMBRE_ACTIVIDAD: {
	      required: true
	    },
	    DESCRIPCION_ACTIVIDAD: {
	      required: true
	    },
	    FECHA_INICIO_ACTIVIDAD: {
	      required: true
	    },
	    FECHA_TERMINO_ACTIVIDAD: {
	      required: true
	    },
	    ESTADO_ACTIVIDAD: {
	      required: true
	    }
	  },
	  messages: {
	    NOMBRE_ACTIVIDAD: {
	      required: "Debe ingresar un nombre"
	    },
	    DESCRIPCION_ACTIVIDAD: {
	      required: "Debe ingresar una descripcion"
	    },
	    FECHA_INICIO_ACTIVIDAD: {
	      required: "Debe ingresar una fecha de inicio"
	    },
	    FECHA_TERMINO_ACTIVIDAD: {
	      required: "Debe ingresar una fecha de termino"
	    },
	    ESTADO_ACTIVIDAD: {
	      required: "Debe ingresar un estado"
	    }
	  }
	});
	
	$('#IdFechaInicioPro').datepicker({ dateFormat: 'yy-mm-dd' }); 
	$('#IdFechaTerminoPro').datepicker({ dateFormat: 'yy-mm-dd' }); 
	$("#IdFechaInicioPro").datepicker(); 
	$("#IdFechaTerminoPro").datepicker(); 
	
	$('#idFechaInicioCompromiso').datepicker({ dateFormat: 'yy-mm-dd' }); 
	$('#idFechaTerminoCompromiso').datepicker({ dateFormat: 'yy-mm-dd' }); 
	$("#idFechaInicioCompromiso").datepicker(); 
	$("#idFechaTerminoCompromiso").datepicker(); 
});

