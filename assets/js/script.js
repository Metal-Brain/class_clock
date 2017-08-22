$(document).ready(function(){
	var num = 2;
	$('#btnAdd').click(function(){
		var a = '<div class="row aux"><div class="col-xs-12 col-sm-12 col-md-1"><label style="padding: 8px 0 0 0;">Aula '+ num +'</label></div><div class="col-xs-12 col-sm-12 col-md-2 form-group"><input name="horario[]" class="form-control hora" type="text" placeholder="Início" minlength="5" maxlength="5"></div><div class="col-xs-12 col-sm-12 col-md-2 form-group"><input name="horario[]" class="form-control hora" type="text" placeholder="Fim" minlength="5" maxlength="5"></div></div>';
		$('.aux').last().after(a);
		num++;
		$('.hora').mask('00:00');
	});

});

$(document).ready(function(){
	$('.hora').mask('00:00');
});

