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

CREATE TABLE
    partidas(
        id VARCHAR(255) PRIMARY KEY,
        data VARCHAR(255),
        timeCasa VARCHAR(255),
        timeFora VARCHAR(255),
        escudo_casa TEXT,
        escudo_fora TEXT,
        gols_casa VARCHAR(255),
        gols_fora VARCHAR(255),
        campeonato VARCHAR(255),
        campeonato_id VARCHAR(255),
        partida_flamengo BOOLEAN NOT NULL,
        rodada_name VARCHAR(255),
        rodada_index INT
    );

CREATE TABLE
    posicoes(
        id VARCHAR(255) PRIMARY KEY,
        ano VARCHAR(255),
        nome VARCHAR(255),
        link VARCHAR(255),
        logo TEXT,
        possui_classificacao BOOLEAN NOT NULL DEFAULT FALSE,
        rodada_atual INT NOT NULL DEFAULT 0
    );