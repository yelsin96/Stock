function ajaxR() {
	var tipo = $("#tipo").val();
	var parametros = {
		"tipo": tipo
	};
	$.ajax({
		data: parametros,
		url: 'registroAjaxArt.php',
		type: 'post',
		beforeSend: function () {
			$(".datos_ajax").html("Procesando, espere por favor...");
		},
		success: function (response) {
			$(".datos_ajax").html(response);
		}
	});
}

function ajaxModal() {
	var id = $("#input-id").val();
	var nombre = $("#input-nombre").val();
	var tipo = $("#input-tipo").val();
	var parametros = {
		"id": id,
		"nombre": nombre,
		"tipo": tipo
	};
	$.ajax({
		data: parametros,
		url: 'registroAjaxModal.php',
		type: 'post',
		beforeSend: function () {
			$("#tabla-ajax").html("Procesando, espere por favor...");
		},
		success: function (response) {
			$("#tabla-ajax").html(response);
		}
	});
}

function seleccionarArt() {
	//var placa=$("#placa-modal").val();
	$(document).on('click', 'button[name="prueba"]', function (event) {
		var ident = this.id;
		$("#input-articulos").val(ident);
		$("#cerrar").trigger("click");
	});
}

function TipoArticulo() {
	var tipo = $("#tipo").val();
	if ($("#sede").val() == "Servired") {
		if (tipo == '1') {
			$("#placa").val("S-");
		} else if (tipo == '2') {
			$("#placa").val("SI-");
		}	
	}else{
		if (tipo == '1') {
			$("#placa").val("M-");
		} else if (tipo == '2') {
			$("#placa").val("MI-");
		}
	}
}

function validarAdmin() {
    if (document.getElementById('validateAdmin').checked){
        document.getElementById('divAdmin').classList.remove('deshabilitarDiv');
    }else{
        document.getElementById('divAdmin').classList.add('deshabilitarDiv');
    }
}