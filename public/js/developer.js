window.onload = function(){
	applyAjaxTables();
}

function applyAjaxTables(){
	var tables = $('table.ajaxTable');
	$.each(tables,function(){
		$(this).DataTable();
	});
}