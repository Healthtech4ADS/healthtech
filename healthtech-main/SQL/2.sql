CREATE TABLE tb_admin (
  id_admin INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  nome VARCHAR(45) NOT NULL,
  PRIMARY KEY(id_admin)
);

CREATE TABLE tb_cliente (
  id_cliente INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  cpf INTEGER UNSIGNED NOT NULL,
  nome VARCHAR(45) NOT NULL,
  telefone VARCHAR(45) NOT NULL,
  cidade VARCHAR(45) NOT NULL,
  rua VARCHAR(200) NOT NULL,
  numero VARCHAR(15) NOT NULL,
  cep VARCHAR(11) NOT NULL,
  plano VARCHAR(15) NOT NULL,
  email VARCHAR(50) NOT NULL,
  PRIMARY KEY(id_cliente, cpf)
);

CREATE TABLE tb_funcionario (
  idtb_funcionario INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  cpf INTEGER UNSIGNED NOT NULL,
  nome VARCHAR(45) NULL,
  telefone VARCHAR(45) NULL,
  endereco VARCHAR(200) NULL,
  cep VARCHAR(11) NULL,
  contrato VARCHAR(50) NULL,
  cargo VARCHAR(3) NULL,
  email VARCHAR(50) NULL,
  PRIMARY KEY(idtb_funcionario, cpf)
);

CREATE TABLE tb_login (
  id_login INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  tb_cliente_cpf INTEGER UNSIGNED NOT NULL,
  tb_cliente_id_cliente INTEGER UNSIGNED NOT NULL,
  tb_funcionario_idtb_funcionario INTEGER UNSIGNED NOT NULL,
  tb_funcionario_cpf INTEGER UNSIGNED NOT NULL,
  senha INTEGER UNSIGNED NOT NULL,
  PRIMARY KEY(id_login, tb_cliente_cpf, tb_cliente_id_cliente, tb_funcionario_idtb_funcionario, tb_funcionario_cpf),
  INDEX tb_login_FKIndex1(tb_cliente_id_cliente, tb_cliente_cpf),
  INDEX tb_login_FKIndex2(tb_funcionario_idtb_funcionario, tb_funcionario_cpf)
);

CREATE TABLE tb_repositorio (
  id_repositorio INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY(id_repositorio)
);


