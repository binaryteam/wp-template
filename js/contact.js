head.ready('jQuery', function(){
	function change_captcha(){
        document.getElementById('captcha').src=directory+"/includes/captcha/get_captcha.php?rnd=" + Math.random();
    }

    function validar_captcha(){
		jQuery.ajax({
			type :"POST",
			url  :directory+"/includes/captcha/validar.php",
			data :"captchacode="+jQuery("#txt_codigo").val(),
			success : function(data){
				if(data=="ok"){
					send_data();
				}else if(data="error"){
					alert("Código de seguridad");
					change_captcha();
				}
			}
		});
	}

	function send_data(){
		var form = jQuery('#quick_contact'),
			action_val = form.attr('action');	
		
		$('#messageBox').html('enviando...');
		jQuery.ajax({
			type: "POST",
			url: action_val,
			data: form.serialize(),
			success: function() {
				jQuery('#form_content_1').fadeOut();
				jQuery('#form_content_2').fadeIn();

				setTimeout(function(){
					jQuery(form)[0].reset();
					change_captcha();
					jQuery('#form_content_2').fadeOut();
					jQuery('#form_content_1').fadeIn();
				}, 6000);
		  	}
		});
		
	}

	head.ready('validate', function() {

		jQuery('#link_refresh').click(function(e) {
	        jQuery('#txt_codigo').val("");
	        jQuery('#txt_codigo').focus();
	         change_captcha();
	         e.preventDefault();
	     });

		jQuery('#recaptcha_response_field').blur(function() {
	        if(jQuery(this).value !== "") $('.recaptcha_input_area').find('label.error').css('visibility','hidden');
	    });

		$("#quick_contact").validate({
		    invalidHandler: function(form, validator) {
		      var errors = validator.numberOfInvalids();
		      if (errors) {
		        var message ='Todos los campos son requeridos.';
		        $("#messageBox").html(message);
		        $("#messageBox").show();
		      } else {
		        $("#messageBox").hide();
		      }
		    },
		    showErrors: function(errorMap, errorList) {

		    },
		    submitHandler: function() {
		    		validar_captcha();
		    		return false;

					/*var form = jQuery('#quick_contact');
					var action_val = form.attr('action');	
					
					jQuery.ajax({
						type: "POST",
						url: action_val,
						data: form.serialize(),
						//data: dataString,
						success: function() {
							jQuery('#form_content_1').hide();
							jQuery('#form_content_2').fadeIn();

							setTimeout(function(){
								jQuery('#form_content_2').hide();
								jQuery('#form_content_1').fadeIn();
							}, 6000);
					  }
					 });

					 $(form)[0].reset();
				
					return false;*/
				}
		 })
	});
});
	 
	
  
