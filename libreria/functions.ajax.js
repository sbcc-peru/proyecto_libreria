
$(document).ready(function(){
	
	var timeSlide = 1000;
	$('#login_username').focus();
	$('#timer').hide(0);
	$('#timer').css('display','none');
	$('#login_userbttn').click(function(){
		$('#timer').fadeIn(300);
		$('.box-info, .box-success, .box-alert, .box-error').slideUp(timeSlide);
		setTimeout(function(){
			if ( $('#login_username').val() != "" && $('#login_userpass').val() != "" ){
				
				$.ajax({
					type: 'POST',
					url: 'log.inout.ajax.php',
					data: 'login_username=' + $('#login_username').val() + '&login_userpass=' + $('#login_userpass').val(),
					success:function(msj){
						if ( msj == 1 ){
							$('#alertBoxes').html('<div class="box-success"></div>');
							$('.box-success').hide(0).html('Espera un momento&#133;');
							$('.box-success').slideDown(timeSlide);
							setTimeout(function(){
								window.location.href = "vista/ventana_principal/principal.php";
							},(timeSlide + 500));
						}
						else{
							$('#alertBoxes').html('<div class="box-error"></div>');
							$('.box-error').hide(0).html('Lo sentimos, pero los datos son incorrectos: ' + msj);
							$('.box-error').slideDown(timeSlide);
						}
						$('#timer').fadeOut(300);
					},
					error:function(){
						$('#timer').fadeOut(300);
						$('#alertBoxes').html('<div class="box-error"></div>');
						$('.box-error').hide(0).html('Ha ocurrido un error durante la ejecución');
						$('.box-error').slideDown(timeSlide);
					}
				});
				
			}
			else{
				$('#alertBoxes').html('<div class="box-error"></div>');
				$('.box-error').hide(0).html('Los campos estan vacios');
				$('.box-error').slideDown(timeSlide);
				$('#timer').fadeOut(300);
			}
		},timeSlide);
		
		return false;
		
	});
	
	
	
	$('#sessionKiller').click(function(){
		$('#timer').fadeIn(300);
		$('#alertBoxes').html('<div class="box-success"></div>');
		$('.box-success').hide(0).html('Espera un momento&#133;');
		$('.box-success').slideDown(timeSlide);
		setTimeout(function(){
			window.location.href = "logout.php";
		},2500);
	});
	
});
