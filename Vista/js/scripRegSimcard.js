function ajaxR() {
	var operador = $("#operador").val();
	var parametros = {
		"operador": operador
	};
	$.ajax({
		data: parametros,
		url: 'RegistroAjaxSimcard.php',
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
	var linea = $("#input-linea").val();
	var serie = $("#input-serie").val();
	var operador = $("#input-operador").val();
	var parametros = {
		"linea": linea,
		"serie": serie,
		"operador": operador
	};
	$.ajax({
		data: parametros,
		url: 'registroSimcardAjaxModal.php',
		type: 'post',
		beforeSend: function () {
			$("#tabla-ajax").html("Procesando, espere por favor...");
		},
		success: function (response) {
			$("#tabla-ajax").html(response);
		}
	});
}

function seleccionarSimcard() {
	$(document).on('click', 'button[name="prueba"]', function (event) {
		var ident = this.id;
		$("#input-simcard").val(ident);
		$("#cerrar").trigger("click");
	});
}