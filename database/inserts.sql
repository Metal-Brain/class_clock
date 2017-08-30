INSERT INTO tipo_sala(nome_tipo_sala, descricao_tipo_sala) VALUES("Teorica", "Mesas e Cadeiras");
INSERT INTO tipo_sala(nome_tipo_sala, descricao_tipo_sala) VALUES("Pratica", "Computadores");
INSERT INTO tipo_sala(nome_tipo_sala, descricao_tipo_sala) VALUES("Hibrida", "Mesas, cadeiras e computadores");
INSERT INTO tipo_sala(nome_tipo_sala, descricao_tipo_sala) VALUES("Auditorio", "Apresentacoes");
INSERT INTO tipo_sala(nome_tipo_sala, descricao_tipo_sala) VALUES("VideoConferencia", "Videoconferencias ao vivo");

INSERT INTO grau(nome_grau, codigo) VALUES("Tecnologia", "00001");
INSERT INTO grau(nome_grau, codigo) VALUES("Bacharel", "00021");
INSERT INTO grau(nome_grau, codigo) VALUES("Pos Graduação", "00231");
INSERT INTO grau(nome_grau, codigo) VALUES("Mestrado", "001321");
INSERT INTO grau(nome_grau, codigo) VALUES("Doutorado", "44121");

INSERT INTO curso(grau_id, nome_curso, sigla_curso, qtd_semestre, fechamento) 
    VALUES(1, "Análise e Desenvolvimento de Sistemas", "ADS", 6, 2);
INSERT INTO curso(grau_id, nome_curso, sigla_curso, qtd_semestre, fechamento) 
    VALUES(2, "Processos Gerenciais", "PRG", 8, 2);
INSERT INTO curso(grau_id, nome_curso, sigla_curso, qtd_semestre, fechamento) 
    VALUES(3, "Fisica", "FIS", 4, 2);
INSERT INTO curso(grau_id, nome_curso, sigla_curso, qtd_semestre, fechamento) 
    VALUES(4, "Computação Avançada", "CPA", 3, 1);
INSERT INTO curso(grau_id, nome_curso, sigla_curso, qtd_semestre, fechamento) 
    VALUES(5, "Cura do Cancer", "CDC", 8, 2);

INSERT INTO disciplina(curso_id, tipo_sala_id, nome_disciplina, sigla_disciplina, qtd_professor, qtd_aulas)
    VALUES(1, 5, "Análise de Sistemas", "ADS", 2, 4);
INSERT INTO disciplina(curso_id, tipo_sala_id, nome_disciplina, sigla_disciplina, qtd_professor, qtd_aulas)
    VALUES(2, 4, "Matemática", "MAT", 1, 6);
INSERT INTO disciplina(curso_id, tipo_sala_id, nome_disciplina, sigla_disciplina, qtd_professor, qtd_aulas)
    VALUES(3, 3, "Fisica Avancada", "FSA", 1, 8);
INSERT INTO disciplina(curso_id, tipo_sala_id, nome_disciplina, sigla_disciplina, qtd_professor, qtd_aulas)
    VALUES(4, 2, "Hardware", "HDW", 2, 2);
INSERT INTO disciplina(curso_id, tipo_sala_id, nome_disciplina, sigla_disciplina, qtd_professor, qtd_aulas)
    VALUES(5, 1, "Medicina", "MED", 2, 2);