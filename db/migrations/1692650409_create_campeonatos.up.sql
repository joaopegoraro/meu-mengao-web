CREATE TABLE
    campeonatos(
        id VARCHAR(255) PRIMARY KEY,
        ano VARCHAR(255),
        nome VARCHAR(255),
        link VARCHAR(255),
        logo TEXT,
        possui_classificacao BOOLEAN NOT NULL DEFAULT FALSE,
        rodada_atual INT NOT NULL DEFAULT 0,
        rodada_final INT NOT NULL DEFAULT 100
    );