CREATE TABLE
    noticias(
        id BIGINT(11) AUTO_INCREMENT PRIMARY KEY,
        link VARCHAR(255) NOT NULL,
        titulo VARCHAR(255) NOT NULL,
        data VARCHAR(255) NOT NULL,
        site VARCHAR(255) NOT NULL,
        logo_site TEXT NOT NULL,
        foto TEXT NOT NULL
    );

CREATE TABLE
    campeonatos(
        id VARCHAR(255) PRIMARY KEY,
        ano VARCHAR(255),
        nome VARCHAR(255),
        link VARCHAR(255),
        logo TEXT,
        possui_classificacao BOOLEAN NOT NULL DEFAULT FALSE,
        rodada_atual INT NOT NULL DEFAULT 0
    );