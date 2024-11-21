create database pratica_II;
use pratica_II;

CREATE TABLE Cliente (
    id_cliente INT AUTO_INCREMENT PRIMARY KEY,
    nome_cliente VARCHAR(100) NOT NULL,
    cpf_cliente CHAR(11) NOT NULL ,
    email_cliente VARCHAR(100) NOT NULL,
    telefone_cliente VARCHAR(15)
);

CREATE TABLE Urgencia (
    id_urgencia INT AUTO_INCREMENT PRIMARY KEY,
    nivel ENUM('baixa', 'media', 'alta') NOT NULL


);

CREATE TABLE Status (
    id_status INT AUTO_INCREMENT PRIMARY KEY,
    estado ENUM('pendente', 'andamento', 'finalizado') NOT NULL
);



CREATE TABLE Funcionarios (
    id_funcionario INT AUTO_INCREMENT PRIMARY KEY,
    nome_funcionario VARCHAR(100) NOT NULL,
    cpf_funcionario CHAR(11) NOT NULL UNIQUE,
    email_funcionario VARCHAR(100)
);

CREATE TABLE Solicitacoes (
    id_solicitacoes INT AUTO_INCREMENT PRIMARY KEY,
    id_cliente INT NOT NULL,
    id_urgencia INT,
    id_status INT,
    FOREIGN KEY (id_cliente) REFERENCES Cliente(id_cliente),
    FOREIGN KEY (id_urgencia) REFERENCES Urgencia(id_urgencia),
    FOREIGN KEY (id_status) REFERENCES Status(id_status)
);

ALTER TABLE Solicitacoes ADD descricao TEXT NOT NULL;

select * from cliente;

insert into urgencia (nivel) values ("baixa"),("media"),("alta");
