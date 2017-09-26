// Wait for the DOM to be ready
$(function(){
  // Initialize form validation on the registration form.
  // It has the name attribute "registration"
  $("#formValidation").validate({
    // Specify validation rules
    rules: {
      // The key name on the left side is the name attribute
      // of an input field. Validation rules are defined
      // on the right side
      nome_tipo_sala: {"required", maxlength:30 
	}
      descricao_tipo_sala: {"required", maxlength:254 
      },
    },
    // Specify validation error messages
    messages: {
      nome_tipo_sala: "Defina o nome da sala com até 30 caracteres!",
      descricao_tipo_sala: "Descreva a sala com até 254 caracteres!",
    },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      form.submit();
    }
  });
});
