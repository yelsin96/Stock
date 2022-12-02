function ajaxR(){
			var operador=$("#operador").val();
	        var parametros = {
	               "operador":operador
	        };
	        $.ajax({
	                data:  parametros,
	                url:   'RegistroAjaxSimcard.php',
	                type:  'post',
	                beforeSend: function () {
	                        $(".datos_ajax").html("Procesando, espere por favor...");
	                },
	                success:  function (response) {
	                        $(".datos_ajax").html(response);
	                }
	        });
    	}