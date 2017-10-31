//add active on menu
var path_atual = window.location.href;
if(path_atual.indexOf("Turno") != -1){
  $('#sidebar-turno').addClass('active');
}else if (path_atual.indexOf("Curso") != -1) {
	$('#sidebar-cursos').addClass('active');
}else if (path_atual.indexOf("Sala") != -1) {
	$('#sidebar-salas').addClass('active');
}else if (path_atual.indexOf("periodo") != -1) {
	$('#sidebar-periodos').addClass('active');
}else if (path_atual.indexOf("Area") != -1) {
	$('#sidebar-areas').addClass('active');
}else if (path_atual.indexOf("Turma") != -1) {
  $('#sidebar-turmas').addClass('active');
}else if (path_atual.indexOf("modalidade") != -1) {
	$('#sidebar-modalidades').addClass('active');
}else if(path_atual.indexOf("Semestre") != -1){
	$('#sidebar-semestres').addClass('active');
}else if(path_atual.indexOf("Funcionario") != -1){
  $('#sidebar-funcionarios').addClass('active');
}else if(path_atual.indexOf("Instituicao") != -1){
  $('#sidebar-instituicao').addClass('active');
}else if(path_atual.indexOf("FPA") != -1){
  $('#sidebar-fpa').addClass('active');
}else if(path_atual.indexOf("Area") != -1){
$('#sidebar-area').addClass('active');
}else if(path_atual.indexOf("pessoa") != -1){
  $('#sidebar-pessoa').addClass('active');
}else if(path_atual.indexOf("disciplina") != -1){
  $('#sidebar-disciplinas').addClass('active');
}else{
  $('#sidebar-home').addClass('active');
}

$('.dropdown-toggle').dropdown();
