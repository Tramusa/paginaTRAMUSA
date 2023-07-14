$(function() {
    $("input,textarea").jqBootstrapValidation({
        preventSubmit: true,
        submitError: function($form, event, errors) {
            // additional error messages or events
        },
        submitSuccess: function($form, event) {
            event.preventDefault(); // prevent default submit behaviour
            // get values from FORM
            var passport = $("input#txtPassport").val();
            var name = $("input#txtNombre").val();
            var s_respuesta1 = $("#s_respuesta1").val();
            var s_respuesta2 = $("#s_respuesta2").val();
            var s_respuesta3 = $("#s_respuesta3").val();
            var s_respuesta4 = $("#s_respuesta4").val();
            var s_respuesta5 = $("#s_respuesta5").val();

            var s_respuesta6 = $("#s_respuesta6").val();
            var s_respuesta7 = $("#s_respuesta7").val();
            var s_respuesta8 = $("#s_respuesta8").val();
            var s_respuesta9 = $("#s_respuesta9").val();
            var s_respuesta10 = $("#s_respuesta10").val();
            var s_respuesta11 = $("#s_respuesta11").val();
            var s_respuesta12 = $("#s_respuesta12").val();
            var s_respuesta13 = $("#s_respuesta13").val();
            var s_respuesta14 = $("#s_respuesta14").val();
            var s_respuesta15 = $("#s_respuesta15").val();
            var s_respuesta16 = $("#s_respuesta16").val();
            var notas1 = $("input#txtNotas1").val();
            var notas2 = $("input#txtNotas2").val();
            var notas3 = $("input#txtNotas3").val();
            var notas4 = $("input#txtNotas4").val();
            var notas5 = $("input#txtNotas5").val();
            var notas6 = $("input#txtNotas6").val();
            var notas7 = $("input#txtNotas7").val();
            var notas8 = $("input#txtNotas8").val();
            var notas9 = $("input#txtNotas9").val();
            var notas10 = $("input#txtNotas10").val();
            var notas11 = $("input#txtNotas11").val();
            var notas12 = $("input#txtNotas12").val();
            var notas13 = $("input#txtNotas13").val();
            var notas14 = $("input#txtNotas14").val();
            var notas15 = $("input#txtNotas15").val();
            var notas16 = $("input#txtNotas16").val();

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
                url: "././encuestatp/sendEncuesta",
                type: "POST",
                dataType: 'json',
                data: {
                    passport: passport,
                    name: name,
                    s_respuesta1: s_respuesta1,
                    s_respuesta2: s_respuesta2,
                    s_respuesta3: s_respuesta3,
                    s_respuesta4: s_respuesta4,
                    s_respuesta5: s_respuesta5,
                    s_respuesta6: s_respuesta6,
                    s_respuesta7: s_respuesta7,
                    s_respuesta8: s_respuesta8,
                    s_respuesta9: s_respuesta9,
                    s_respuesta10: s_respuesta10,
                    s_respuesta11: s_respuesta11,
                    s_respuesta12: s_respuesta12,
                    s_respuesta13: s_respuesta13,
                    s_respuesta14: s_respuesta14,
                    s_respuesta15: s_respuesta15,
                    s_respuesta16: s_respuesta16,
                    notas1: notas1,
                    notas2: notas2,
                    notas3: notas3,
                    notas4: notas4,
                    notas5: notas5,
                    notas6: notas6,
                    notas7: notas7,
                    notas8: notas8,
                    notas9: notas9,
                    notas10: notas10,
                    notas11: notas11,
                    notas12: notas12,
                    notas13: notas13,
                    notas14: notas14,
                    notas15: notas15,
                    notas16: notas16
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
