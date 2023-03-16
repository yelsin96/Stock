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

