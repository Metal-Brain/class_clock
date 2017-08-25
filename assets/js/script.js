$(document).ready(function(){
	mask();
	var num = 2;
	//função para adicionar horário
	$('#btnAdd').click(function(){
		var a = '<div class="row aux"><div class="col-xs-12 col-sm-12 col-md-1"><label style="padding: 8px 0 0 0;">Aula '+ num +'</label></div><div class="col-xs-12 col-sm-12 col-md-2 form-group"><input name="horario[]" class="form-control hora inicio" type="text" placeholder="Início" minlength="5" maxlength="5"></div><div class="col-xs-12 col-sm-12 col-md-2 form-group"><input name="horario[]" class="form-control hora inicio fim" type="text" placeholder="Fim" minlength="5" maxlength="5"></div></div>';
		$('.aux').last().after(a);
		num++;
		mask();
	});
	//função para remover o horário
	$('#btnRemove').click(function(){
		if(num > 2){
			$('.aux:last').remove();
			num--;
		}
	});

	$('.cadastrar').click(function(){
			$('.aux').val();
	});
});

function mask() {
	$('.hora').mask('00:00');
}

$(document).ready(function(){
	$('#formTurnos').validate({
		rules: {
			nome_turno: { required: true, maxlength: 20 },
			//inicio: { required: true }
		},
		messages: {
			nome_turno: { required: 'Campo obrigatório', maxlength: 'O campo nome deve ter no mínimo 5 caracteres' },
			//inicio: ( required: 'teste' )
		}
	});
	$.validator.addClassRules({
		inicio: {
			required: true
		},
		fim: {
			required: true,
		},

	});
});
