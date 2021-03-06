!function(a){function b(b,d){function e(){if(w){$canvas=a('<canvas class="pg-canvas"></canvas>'),v.prepend($canvas),p=$canvas[0],q=p.getContext("2d"),f();for(var b=Math.round(p.width*p.height/d.density),c=0;b>c;c++){var e=new l;e.setStackPos(c),x.push(e)}a(window).on("resize",function(){h()}),a(document).on("mousemove",function(a){y=a.pageX,z=a.pageY}),B&&!A&&window.addEventListener("deviceorientation",function(){D=Math.min(Math.max(-event.beta,-30),30),C=Math.min(Math.max(-event.gamma,-30),30)},!0),g(),o("onInit")}}function f(){p.width=v.width(),p.height=v.height(),q.fillStyle=d.dotColor,q.strokeStyle=d.lineColor,q.lineWidth=d.lineWidth}function g(){if(w){s=a(window).width(),t=a(window).height(),q.clearRect(0,0,p.width,p.height);for(var b=0;b<x.length;b++)x[b].updatePosition();for(var b=0;b<x.length;b++)x[b].draw();E||(r=requestAnimationFrame(g))}}function h(){for(f(),i=x.length-1;i>=0;i--)(x[i].position.x>v.width()||x[i].position.y>v.height())&&x.splice(i,1);var a=Math.round(p.width*p.height/d.density);if(a>x.length)for(;a>x.length;){var b=new l;x.push(b)}else a<x.length&&x.splice(a);for(i=x.length-1;i>=0;i--)x[i].setStackPos(i)}function j(){E=!0}function k(){E=!1,g()}function l(){switch(this.stackPos,this.active=!0,this.layer=Math.ceil(3*Math.random()),this.parallaxOffsetX=0,this.parallaxOffsetY=0,this.position={x:Math.ceil(Math.random()*p.width),y:Math.ceil(Math.random()*p.height)},this.speed={},d.directionX){case"left":this.speed.x=+(-d.maxSpeedX+Math.random()*d.maxSpeedX-d.minSpeedX).toFixed(2);break;case"right":this.speed.x=+(Math.random()*d.maxSpeedX+d.minSpeedX).toFixed(2);break;default:this.speed.x=+(-d.maxSpeedX/2+Math.random()*d.maxSpeedX).toFixed(2),this.speed.x+=this.speed.x>0?d.minSpeedX:-d.minSpeedX}switch(d.directionY){case"up":this.speed.y=+(-d.maxSpeedY+Math.random()*d.maxSpeedY-d.minSpeedY).toFixed(2);break;case"down":this.speed.y=+(Math.random()*d.maxSpeedY+d.minSpeedY).toFixed(2);break;default:this.speed.y=+(-d.maxSpeedY/2+Math.random()*d.maxSpeedY).toFixed(2),this.speed.x+=this.speed.y>0?d.minSpeedY:-d.minSpeedY}}function m(a,b){return b?void(d[a]=b):d[a]}function n(){v.find(".pg-canvas").remove(),o("onDestroy"),v.removeData("plugin_"+c)}function o(a){void 0!==d[a]&&d[a].call(u)}var p,q,r,s,t,u=b,v=a(b),w=!!document.createElement("canvas").getContext,x=[],y=0,z=0,A=!navigator.userAgent.match(/(iPhone|iPod|iPad|Android|BlackBerry|BB10|mobi|tablet|opera mini|nexus 7)/i),B=!!window.DeviceOrientationEvent,C=0,D=0,E=!1;return d=a.extend({},a.fn[c].defaults,d),l.prototype.draw=function(){q.beginPath(),q.arc(this.position.x+this.parallaxOffsetX,this.position.y+this.parallaxOffsetY,d.particleRadius/2,0,2*Math.PI,!0),q.closePath(),q.fill(),q.beginPath();for(var a=x.length-1;a>this.stackPos;a--){var b=x[a],c=this.position.x-b.position.x,e=this.position.y-b.position.y,f=Math.sqrt(c*c+e*e).toFixed(2);f<d.proximity&&(q.moveTo(this.position.x+this.parallaxOffsetX,this.position.y+this.parallaxOffsetY),d.curvedLines?q.quadraticCurveTo(Math.max(b.position.x,b.position.x),Math.min(b.position.y,b.position.y),b.position.x+b.parallaxOffsetX,b.position.y+b.parallaxOffsetY):q.lineTo(b.position.x+b.parallaxOffsetX,b.position.y+b.parallaxOffsetY))}q.stroke(),q.closePath()},l.prototype.updatePosition=function(){if(d.parallax){if(B&&!A){var a=(s-0)/60;pointerX=(C- -30)*a+0;var b=(t-0)/60;pointerY=(D- -30)*b+0}else pointerX=y,pointerY=z;this.parallaxTargX=(pointerX-s/2)/(d.parallaxMultiplier*this.layer),this.parallaxOffsetX+=(this.parallaxTargX-this.parallaxOffsetX)/10,this.parallaxTargY=(pointerY-t/2)/(d.parallaxMultiplier*this.layer),this.parallaxOffsetY+=(this.parallaxTargY-this.parallaxOffsetY)/10}switch(d.directionX){case"left":this.position.x+this.speed.x+this.parallaxOffsetX<0&&(this.position.x=v.width()-this.parallaxOffsetX);break;case"right":this.position.x+this.speed.x+this.parallaxOffsetX>v.width()&&(this.position.x=0-this.parallaxOffsetX);break;default:(this.position.x+this.speed.x+this.parallaxOffsetX>v.width()||this.position.x+this.speed.x+this.parallaxOffsetX<0)&&(this.speed.x=-this.speed.x)}switch(d.directionY){case"up":this.position.y+this.speed.y+this.parallaxOffsetY<0&&(this.position.y=v.height()-this.parallaxOffsetY);break;case"down":this.position.y+this.speed.y+this.parallaxOffsetY>v.height()&&(this.position.y=0-this.parallaxOffsetY);break;default:(this.position.y+this.speed.y+this.parallaxOffsetY>v.height()||this.position.y+this.speed.y+this.parallaxOffsetY<0)&&(this.speed.y=-this.speed.y)}this.position.x+=this.speed.x,this.position.y+=this.speed.y},l.prototype.setStackPos=function(a){this.stackPos=a},e(),{option:m,destroy:n,start:k,pause:j}}var c="particleground";a.fn[c]=function(d){if("string"==typeof arguments[0]){var e,f=arguments[0],g=Array.prototype.slice.call(arguments,1);return this.each(function(){a.data(this,"plugin_"+c)&&"function"==typeof a.data(this,"plugin_"+c)[f]&&(e=a.data(this,"plugin_"+c)[f].apply(this,g))}),void 0!==e?e:this}return"object"!=typeof d&&d?void 0:this.each(function(){a.data(this,"plugin_"+c)||a.data(this,"plugin_"+c,new b(this,d))})},a.fn[c].defaults={minSpeedX:.1,maxSpeedX:.7,minSpeedY:.1,maxSpeedY:.7,directionX:"center",directionY:"center",density:1e4,dotColor:"#666666",lineColor:"#666666",particleRadius:7,lineWidth:1,curvedLines:!1,proximity:100,parallax:!0,parallaxMultiplier:5,onInit:function(){},onDestroy:function(){}}}(jQuery),function(){for(var a=0,b=["ms","moz","webkit","o"],c=0;c<b.length&&!window.requestAnimationFrame;++c)window.requestAnimationFrame=window[b[c]+"RequestAnimationFrame"],window.cancelAnimationFrame=window[b[c]+"CancelAnimationFrame"]||window[b[c]+"CancelRequestAnimationFrame"];window.requestAnimationFrame||(window.requestAnimationFrame=function(b){var c=(new Date).getTime(),d=Math.max(0,16-(c-a)),e=window.setTimeout(function(){b(c+d)},d);return a=c+d,e}),window.cancelAnimationFrame||(window.cancelAnimationFrame=function(a){clearTimeout(a)})}();

window.onload = function(){
	
	applyAjaxTables();
	applyLoginAnimation();
	applyDevicesDragable();
	startRentListener();
	activateCountdown();
	displayNotifications();

	setInterval(function() {
		$.toast().reset('all');
		displayNotifications();	    
	}, 60000);


	$(document.body).on('click','button.add',function(e){
		e.preventDefault();
		var container = $(this).closest('div.custom-number-container');
		var input = container.find('input.custom-number');
		var defValue =  input.val();
		var currValue = input.val();
		var minVal = input.attr("min");
		if (isNumeric(currValue) && isNumeric(minVal)) {
			var currNumber = changeToInt(currValue);
			currNumber += 1;
			minVal = changeToInt(minVal);
			if (isValidValue(currNumber, minVal)) {
				currNumber = currNumber.toString();
				input.val(currNumber);
			}else{
				input.val(minVal.toString());
			}
		}else{
			return;
		}
	});

	$(document.body).on('click','button.substract',function(e){
		e.preventDefault();
		var container = $(this).closest('div.custom-number-container');
		var input = container.find('input.custom-number');
		var defValue =  input.val();
		var currValue = input.val();
		var minVal = input.attr("min");
		if (isNumeric(currValue) && isNumeric(minVal)) {
			var currNumber = changeToInt(currValue);
			currNumber -= 1;
			minVal = changeToInt(minVal);
			if (isValidValue(currNumber, minVal)) {
				currNumber = currNumber.toString();
				input.val(currNumber.toString());
			}else{
				input.val(minVal.toString());
			}
		}else{
			return;
		}
	});

	$(document.body).on('change','input.custom-number',function(e){
		e.preventDefault();
		input = $(this);
		var minVal = input.attr('min');
		if (!isNumeric(input.val())) {
			input.val(minVal);
		}
	});

	$(document.body).on('click','a.close-rent',function(e){
		e.preventDefault();
		var btn = $(this);
		var rent = btn.data('rent');
		var mainContainer = btn.closest('div.dragme');
		var device = mainContainer.data('device');
		if (mainContainer.length > 0) {
			var clocktainer = mainContainer.find('h4.clock-container');
			if (clocktainer.length > 0) {
				var isAnticipated = clocktainer.data('ended');
				if (typeof isAnticipated !== 'undefined' && isAnticipated === true) {
					var divColor = mainContainer.find('div.clock-style');
					divColor.removeClass('bg-green')
					divColor.addClass('bg-aqua');
					clocktainer.removeData('ended');
					var rentBtn =  $('<button data-url="/devices/newrent/'+device+'" data-title="Nueva Renta " class="btn btn-block btn-primary btn-device-action"><i class="fa fa-hourglass-1"></i><small><b>&nbsp;Rentar</b></small></button>');
					btn.hide();
					btn.after(rentBtn);
					btn.remove();
					rentBtn.on('click',function(e){
						e.preventDefault();
						var modal = $('#generalModal');
						if (typeof modal !== 'undefined') {
							var options = {
							        url: rentBtn.data('url'),
							        title:rentBtn.data('title'),
							        size: eModal.size.md,
							        useBin:false,
							        buttons: [
							            {text: 'Cancelar', style: 'info',   close: true, click:destroyEmodal},
							            {
							            	text: 'Rentar',
						            	 	style: 'danger',
						            	  	close: true,
						            	   	click:function(e){
								           		var form = $("form#newrent");
								           		var hours = form.find('input[name=hours]');
								           		var minutes = form.find('input[name=minutes]');
								           		if (typeof hours !== 'undefined' && typeof minutes !== 'undefined') {
									           		form.submit();
								           		}else{
								           			return;
								           		}
							            	}
							            }
							        ],
							    };
							params = {
								backdrop:'static'
							};
							eModal.setModalOptions(params) 
							eModal.ajax(options);
						}
					});
				}else{
					var options = {
					        message: "Esta a punto de finalizar una renta de manera anticipada.",
					        title: "¿ Seguro que desea continuar ?",
					        size: eModal.size.xs,
					    };
					eModal.confirm(options).then(function(){
			       		closenow(rent);
			       },function(){
	       				destroyEmodal();
			       });
				}
			}else{
				console.log("No clock found");
			}
		}else{
			console.log("no mainContainer found");
		}
	});

	$('input.float').keypress(function(event) {
	  if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
	    event.preventDefault();
	  }
	});
}


function displayNotifications(){
	$.get('/storage/productvisor',function(r){
		if (r.success) {
			$.each(r.criticProducts,function(index,product){
				var title 	= 	"Estado Crítico";
				var msg 	= 	"Solo existen <b>"+product.number+"</b> existencias en inventario del producto: <b>"+product.name+"</b>";
				var icon 	= 	"warning";
				var sticky	=	true;
				showToast(title,msg,icon,sticky);
			});
		}else{
			eval(r.callbackScript);
		}
	},'json');
}

function closenow(rent){
	$.ajax({
		type    : 'POST', 
		url     : '/rents/finalize',
		data    : {id:rent}, 
		dataType: 'json', 
		encode  : true,
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		success:function(r){
			if (r.success) {
				eval(r.callbackScript);
			}else{
				console.log("error");
				eval(r.callbackScript);
			}
		},
		error:function(e,v){
			console.log(e);
			console.log(v);
		}
	});
}

function reloadPage(){
	location.reload();
}

function showToast(title,msg,icon,sticky){
	$.toast({
	    heading: title,
	    showHideTransition : 'slide',
	    text: msg,
	    icon: icon,
	    textColor : '#eee',
	    hideAfter : sticky ? false : 10000, 
	    loader: true,        // Change it to false to disable loader
	    loaderBg: '#9EC600',  // To change the background
	    position:'top-right'
	});
}

function isValidValue(value, min){
	var valid = false;
	if (value > min) {
		valid = true;
	}
	return valid;
}

function changeToInt(value){
	return parseInt(value);
}

function isNumeric(value){
	var isNumber =  /^\d+$/.test(value);
	var numbers = value;
	if(!$.isNumeric(numbers)){
		return false;
	}
	else{
		if (isNumber) {
			return true;
			
		}else{
			return false;
		}
	}
}

function activateCountdown(){
	var clocks = $('.clock-container');
	$.each(clocks,function(){
		var clocktainer = $(this);
		if ($(this).data('value')) {
			$(this).countdown($(this).data('value'), function(event) {
			  $(this).html(event.strftime('%H:%M:%S'));
			}).on('finish.countdown',function(event){
				var rent = $(this).data('rent');
				if (typeof rent !== 'undefined') {
					$.ajax({
					  type    : 'POST', 
					  url     : '/rents/closerent',
					  data    : {id:rent}, 
					  dataType: 'json', 
					  encode  : true,
					  headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
					  success:function(r){
					  	if (r.success) {
					  		clocktainer.data("ended",true);
					  		var container = clocktainer.closest('div.clock-style');
					  		container.removeClass('bg-green');
					  		container.addClass('bg-red');
					  		eval(r.callbackScript);
					  	}else{
					  		console.log("error");
					  		eval(r.callbackScript);
					  	}
					  },
					  error:function(e,v){
					  	console.log(e);
					  	console.log(v);
					  }
					});
				}

			});
		}
	});
}

function startRentListener(){
	var buttons = $("button.btn-device-action");
	if (typeof buttons !== 'undefined' && buttons.length > 0) {
		$.each(buttons,function(){
			var btn = $(this);
			btn.on('click',function(e){
				e.preventDefault();
				var modal = $('#generalModal');
				if (typeof modal !== 'undefined') {
					var options = {
					        url: btn.data('url'),
					        title:btn.data('title'),
					        size: eModal.size.md,
					        useBin:false,
					        buttons: [
					            {text: 'Cancelar', style: 'info',   close: true, click:destroyEmodal},
					            {
					            	text: 'Rentar',
				            	 	style: 'danger',
				            	  	close: true,
				            	   	click:function(e){
						           		var form = $("form#newrent");
						           		var hours = form.find('input[name=hours]');
						           		var minutes = form.find('input[name=minutes]');
						           		if (typeof hours !== 'undefined' && typeof minutes !== 'undefined') {
							           		form.submit();
						           		}else{
						           			return;
						           		}
					            	}
					            }
					        ],
					    };
					params = {
						backdrop:'static'
					};
					eModal.setModalOptions(params) 
					eModal.ajax(options);
				}
			});
		});
	}
}

function eventB(){
	console.log("click");
}

function destroyEmodal(){
	$("#myEmodal").on('hidden.bs.modal', function () {
 		$(this).data('bs.modal', null);
	});
}

function applyDevicesDragable(){
	var container = document.getElementById("multi-drag");
	if (typeof container !== 'undefined' && container !== null) {
		var sort = Sortable.create(container, {
		  animation: 150, // ms, animation speed moving items when sorting, `0` — without animation
		  ghostClass: "ghost",
		  chosenClass: "chosen",
		  handle: ".inner", // Restricts sort start click/touch to the specified element
		  // draggable: ".tile", // Specifies which items inside the element should be sortable
		  // Element is chosen
		  	onChoose: function (/**Event*/evt) {
		  		evt.oldIndex;  // element index within parent
		  		console.log("chose");
		  	},
		  	// Element dragging started
		  	onStart: function (/**Event*/evt) {
		  		evt.oldIndex;  // element index within parent
		  		console.log("started");
		  		var cloneEl = evt.clone;
		  		// cloneEl.setAttribute("style", "background-color:transparent");
		  	},
		  	onUpdate: function (evt/**Event*/){
		     var item = evt.item; // the current dragged HTMLElement
		  	},
		  	// Called when creating a clone of element
		  	onClone: function (/**Event*/evt) {
		  		console.log("cloned");
		  		var origEl = evt.item;
		  		var cloneEl = evt.clone;
		  		
		  		
		  	}
		});
	}
	
}

function applyLoginAnimation(){
	$('#particles').particleground({
	    minSpeedX: 0.1,
	    maxSpeedX: 0.7,
	    minSpeedY: 0.1,
	    maxSpeedY: 0.7,
	    directionX: 'center',
	    directionY: 'center',
	    density: 10000,
	    dotColor: '#eee',
	    lineColor: '#eee',
	    particleRadius: 7,
	    lineWidth: 1,
	    curvedLines: true,
	    proximity: 100,
	    parallax: false
	});
}

function applyAjaxTables(){
	var tables = $('table.ajaxTable');
	$.each(tables,function(){
		$(this).DataTable({
			"ajax":$(this).data('url'),
			"processing": true,
			"iDisplayLength": 10,
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
