CREATE DATABASE sistema_php;
USE sistema_php;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    nome VARCHAR(50) NOT NULL,
    senha VARCHAR(255) NOT NULL
);

INSERT INTO usuarios (email, nome, senha)
VALUES ('admin@teste.com', 'Administrador', '123');
