$(document).ready(function () {
	var validacion=0,validacion2=0,validacion3=0,validacion4=0;
	setInterval(function() {
			if(validacion&&validacion2&&validacion3&&validacion4){
				$("#regis").removeClass('disabled');
				$("#desa").addClass('text-hide');
			}else{
				$("#regis").addClass('disabled');
				$("#desa").removeClass('text-hide');
			}
	},1000);
	function verificar_clave(clave) {
		$.ajax({
			type:"POST",
			url:"php/verificar_clave.php",
			data:{
				Clave:clave
			},
			dataType:"text",
			success: function(data) {
				console.log(data);
				if(data=="1"){
					validacion=1;
					$("#txtcnv").addClass('text-hide');
					$("#txtcd").addClass('text-hide');
				}
				if(data=="0"){
					$("#txtcnv").removeClass('text-hide');
					$("#txtcd").addClass('text-hide');
					validacion=0;
				}
				if(data=="2"){
					$("#txtcnv").addClass('text-hide');
					$("#txtcd").removeClass('text-hide');
					validacion=0;
				}
			}
		});
	}
	function verificar_email(email) {
		var da=0;
		$.ajax({
			type:"POST",
			url:"php/verificar_email.php",
			data:{
				Email:email
			},
			dataType:"text",
			success: function(data) {
				console.log(data);
				if(data=="1"){
					$("#txte").removeClass('text-hide');
					validacion2=0;
				}else{
					$("#txte").addClass('text-hide');
					validacion2=1;
				}
			}
		});
		// body...
	}
	$("#email").on("change",function(event){
		var email=$(this).val();
		verificar_email(email);
	});
	$("#pass").on("input",function(event) {
		/* Act on the event */
		var pass=$(this).val();
		if(pass.length>5){
			$("#txtl").addClass('text-hide');
			validacion3=1;
		}
		else{
		    $("#txtl").removeClass('text-hide');
		   validacion3=2;
		}
	});
	$("#pass1").on("input",function(event) {
		/* Act on the event */
		var pass=$("#pass").val();
		var pas2=$(this).val();
		if(pass==pas2){
			$("#txtc").addClass('text-hide');
			validacion4=1;
		}
		else {
			$("#txtc").removeClass('text-hide');
			validacion4=0;
		}
	});
	$("#clave").on("input",function(event) {
		var clave=$(this).val();
		verificar_clave(clave);
	});
	// body...
});
