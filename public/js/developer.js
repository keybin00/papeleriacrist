window.onload = function(){
	applyAjaxTables();
}

function applyAjaxTables(){
	var tables = $('table.ajaxTable');
	$.each(tables,function(){
		$(this).DataTable({
			"ajax":$(this).data('url'),
			"processing": true,
			"iDisplayLength": 50,
			 "language": {
            	"lengthMenu": "Mostrar _MENU_ registros por página",
            	"zeroRecords": "Búsqueda sin resultados",
            	"info": "Pagina _PAGE_ de _PAGES_",
            	"infoEmpty": "No se encontraron registros",
            	"infoFiltered": "(Registros encontrados de un total de _MAX_ )",
            	"search":         "Buscar:",
        	  	"loadingRecords": "Cargando...",
				"processing":     "Procesando...",
            	"paginate": {
	    	       "first":      "Primera",
	    	       "last":       "Última",
	    	       "next":       "Siguiente",
	    	       "previous":   "Anterior"
            	},
        	}
		});
	});
}