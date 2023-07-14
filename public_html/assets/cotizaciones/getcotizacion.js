$(function() {
    $("input,textarea").jqBootstrapValidation({
        preventSubmit: true,
        submitError: function($form, event, errors) {
            // additional error messages or events
        },
        submitSuccess: function($form, event) {
            event.preventDefault(); // prevent default submit behaviour
            // get values from FORM
            var name = $("input#user-name").val();
            var email = $("input#user-email").val();
            var phone = $("input#user-phone").val();
            var subject = $("input#user-subject").val();
            var origen = $("input#user-origen").val();
            var destino = $("input#user-destino").val();
            var message = $("textarea#user-message").val();
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
                url: "././inicio/sendCotizacion",
                type: "POST",
                dataType: 'json',
                data: {
                    name: name,
                    email: email,
                    phone: phone,
                    origen: origen,
                    destino: destino,
                    subject: subject,
                    message: message
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
	                    $('#cotizacionForm').trigger("reset");
                	}
                	else if(data.success){
	                    // Success message
	                    $('#success').html("<div class='alert alert-success'>");
	                    $('#success > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;").append("</button>");
	                    $('#success > .alert-success').append("<strong>Cotización enviada con éxito. </strong>");
	                    $('#success > .alert-success').append('</div>');
	                    //clear all fields
	                    $('#cotizacionForm').trigger("reset");
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