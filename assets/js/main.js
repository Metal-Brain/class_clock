//add active on menu
var path_atual = window.location.href;
if(path_atual.indexOf("Turno") != -1){
  $('#sidebar-turno').addClass('active');
}else if (path_atual.indexOf("Curso") != -1) {
  $('#sidebar-cursos').addClass('active');
}else if(path_atual.indexOf("Semestre") != -1){
$('#sidebar-semestres').addClass('active');
}else if(path_atual.indexOf("Funcionario") != -1){
  $('#sidebar-funcionarios').addClass('active');
}else if(path_atual.indexOf("Instituicao") != -1){
  $('#sidebar-instituicao').addClass('active');
}else if(path_atual.indexOf("FPA") != -1){
  $('#sidebar-fpa').addClass('active');
}else{
  $('#sidebar-home').addClass('active');
}
