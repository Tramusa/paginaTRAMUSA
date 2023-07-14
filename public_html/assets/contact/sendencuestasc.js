$(function() {
    $("input,textarea").jqBootstrapValidation({
        preventSubmit: true,
        submitError: function($form, event, errors) {
            // additional error messages or events
        },
        submitSuccess: function($form, event) {
            event.preventDefault(); // prevent default submit behaviour
            // get values from FORM
            var name = $("input#txtNombre").val();
            var company = $("input#txtEmpresa").val();
            var phone = $("input#txtTel").val();
            var email = $("input#txtEmail").val();
            var quejas = $("textarea#txtQuejas").val();
            var solucion = $("textarea#txtSolucion").val();
            var clasifica = $('input:radio[name=rbClasifica]:checked').val();
            var firstName = name; // For Success/Failure Message
            // Check for white space in name for Success/Fail message
            if (firstName.indexOf(' ') >= 0) {
                firstName = name.split(' ').slice(0, -1).join(' ');
            }
            $.blockUI({
              message: 'Procesando',
              css: {
              border: 'none',
              padding: '15px',
              backgroundColor: '#000',
              '-webkit-border-radius': '10px',
              '-moz-border-radius': '10px',
              opacity: '.5',
              color: '#fff',
              fontSize: '14px',
              fontFamily: 'Verdana,Arial',
              fontWeight: 200,
              } }
            );
            $.ajax({
                /*url: "././mail/contact_me.php",*/
                url: "././encuestasc/sendEncuesta",
                type: "POST",
                dataType: 'json',
                data: {
                    name: name,
                    company: company,
                    email: email,
                    phone: phone,
                    quejas: quejas,
                    solucion: solucion,
                    clasifica: clasifica
                },
                cache: false,
                success: function(data) {
                	if(data.error){
	                    // Fail message
	                    $('#success').html("<div class='alert alert-danger'>");
	                    $('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;").append("</button>");
	                    $('#success > .alert-danger').append("<strong>Sorry " + firstName + ", it seems that my mail server is not responding. Please try again later!");
	                    $('#success > .alert-danger').append('</div>');
	                    //clear all fields
	                    $('#contactForm').trigger("reset");
                	}
                	else if(data.success){
	                    // Success message
	                    $('#success').html("<div class='alert alert-success'>");
	                    $('#success > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;").append("</button>");
	                    $('#success > .alert-success').append("<strong>Mensaje enviado con éxito. </strong>");
	                    $('#success > .alert-success').append('</div>');
	                    //clear all fields
	                    $('#contactForm').trigger("reset");
					        }
                  $.unblockUI();
                }
            })
        },
        filter: function() {
            return $(this).is(":visible");
        },
    });
});


/*When clicking on Full hide fail/success boxes */
$('#name').focus(function() {
    $('#success').html('');
});