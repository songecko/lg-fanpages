var sending = false;

function clearFormStyles()
{
	$('#content form').removeClass('error');
}

function clearFormValues()
{
	$('#content form input').val('');
}

function clearMessage()
{
	$('#message').removeClass('error');
	$('#message').removeClass('success');
	$('#message').hide();
}

function updateMessage(message, className)
{
	clearMessage();
	$('#message').html(message);
	if(className != false)
	{
		$('#message').addClass(className);
	}
	$('#message').show();
}

function setSendingState()
{
	sending = true;
	//updateMessage('Enviando...', false);
	$('button[type="submit"]').addClass('disabled');
}

function setSendingSuccessState()
{
	sending = false;
	//updateMessage('Datos enviados correctamente, gracias por participar!', 'success');
	alert('Datos enviados correctamente, gracias por participar!');
	$('button[type="submit"]').removeClass('disabled');
	
	clearFormStyles();
	clearFormValues();
}

function setErrorValidationState()
{
	//updateMessage('Debes completar correctamente todos los campos.', 'error');
	alert('Debes completar correctamente todos los campos.');
}

function setClearState()
{
	clearMessage();
	clearFormStyles();
}

function isEmail(email) {
	var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	return regex.test(email);
}

function isValidForm()
{
	var isValid = true;
	
	if($.trim($('#fullname').val()) == '')
	{
		isValid = false;
	}	
	if($.trim($('#email').val()) == '' || !isEmail($('#email').val()))
	{
		isValid = false;
	}	
	if($.trim($('#phone').val()) == '')
	{
		isValid = false;
	}	
	if($.trim($('#country').val()) == '')
	{
		isValid = false;
	}
	if($('#accept').is(':checked') == false)
	{
		isValid = false;
	}	
	
	if(!isValid)
	{
		$('#content form').addClass('error');
		setErrorValidationState();
	}
	
	return isValid;
}

$(document).ready(function()
{
	$('#content form').submit(function(e) 
	{
		if(!sending)
		{
			setClearState();
		
			if(isValidForm())
			{			
				setSendingState();
			
				$.ajax({
					type: "POST",
					url: 'processForm.php',
					data: $(this).serialize(),
					success: function(data, textStatus, jqXHR)
					{
						setSendingSuccessState();
					}
				});
			}			
		}
		
		e.preventDefault();
		return false;
	});
});