		$(function() {
			load(1);
		});
		function load(page){
			var query=$("#name").val();
			var location=$("#location").val();
			var status=$("#status").val();
			var per_page=$("#per_page").val();			
			var parametros = {'action':'ajax','page':page,'query':query,'location':location,'status':status,'per_page':per_page};
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'RegistroAjaxReport.php',
				data: parametros,
				type: 'post',
				 beforeSend: function(objeto){
				$("#loader").html("Cargando...");
			  },
				success:function(data){
					$(".datos_ajax").html(data).fadeIn('slow');
					$("#loader").html("");
				}
			})
		}