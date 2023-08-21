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
        data VARCHAR(255) NOT NULL,
        timeCasa VARCHAR(255) NOT NULL,
        timeFora VARCHAR(255) NOT NULL,
        escudo_casa TEXT NOT NULL,
        escudo_fora TEXT NOT NULL,
        gols_casa VARCHAR(255) NOT NULL,
        gols_fora VARCHAR(255) NOT NULL,
        campeonato VARCHAR(255) NOT NULL,
        campeonato_id VARCHAR(255) NOT NULL,
        partida_flamengo BOOLEAN NOT NULL,
        rodada_name VARCHAR(255),
        rodada_index INT
    );

CREATE TABLE
    posicoes(
        id VARCHAR(255) PRIMARY KEY,
        posicao VARCHAR(255) NOT NULL,
        nomeTime VARCHAR(255) NOT NULL,
        escudoTime TEXT NOT NULL,
        pontos VARCHAR(255) NOT NULL,
        jogos VARCHAR(255) NOT NULL,
        vitorias VARCHAR(255) NOT NULL,
        empates VARCHAR(255) NOT NULL,
        derrotas VARCHAR(255) NOT NULL,
        golsFeitos VARCHAR(255) NOT NULL,
        golsSofridos VARCHAR(255) NOT NULL,
        saldoGols VARCHAR(255) NOT NULL,
        campeonatoId VARCHAR(255) NOT NULL,
        classificacaoName VARCHAR(255) NOT NULL,
        classificacaoIndex INT NOT NULL,
    );