$(document).ready(function() {
  	$('#tokenfield').tokenfield({
    	autocomplete: {
      		source: ['Criolla', 'China', 'Marina', 'Peruana', 'Mexicana','Frita','Saludable','Desayuno','Almuerzo','Cena'],
      		delay: 100
    	},
    	showAutocompleteOnFocus: true

  	});

  	$("#anon").click(function(){
	    activaranon();
	});

  	function activaranon() {
		if ($('#anon').prop('checked')) {
			$( "#allias" ).prop( "disabled", false );
			$( "#allias" ).prop( "required", true );
		}
		else{
			$( "#allias" ).prop( "disabled", true );
			$( "#allias" ).prop( "required", false );
		}
	}

	$("#alternativas").click(function(){

		for (var i = 2; i <= 5; i++) {
			
			if ($("#alterna").find("#alter"+i).length==0) {
				
				$("#alterna").append("<div class='row'><div class='col-sm-3'>"+
		 		"<input type='text' class='form-control' name='alterPregu"+i+"' id='alter"+i+"' placeholder='Agrega alternativas'>"+
		 		"</div><button type='button' class='btn btn-danger btn-sm' id='xop"+i+"'>"+
		 		"<span class='glyphicon glyphicon-remove' aria-hidden='true'></span></button></div>");
		 		
		 		$("#xop"+i).click(function(){
				    $("#xop"+i).parent().remove();
				});

				break;
			}
			else if (i==5) {
				alert('Solo se pueden usar 5 alternativas máximo');
			}
		}

	});

	$("#inputEmail3").focus(function(){
        $("#hacerquest").show();
    });
	$("#inputEmail3").focusout(function(){
        if ($("#inputEmail3").val()=='') {
        	$("#hacerquest").hide();
        }
    });

	$("[id*=mosCom]").click(function(){
        // $("#comend").show();
        // $(this).parent().parent().children('div.comentario').show();
        $(this).parent().siblings('div#comend').show();
    });
});