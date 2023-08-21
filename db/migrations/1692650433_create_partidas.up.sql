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