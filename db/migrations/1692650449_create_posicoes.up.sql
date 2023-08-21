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
        classificacaoIndex INT NOT NULL
    );