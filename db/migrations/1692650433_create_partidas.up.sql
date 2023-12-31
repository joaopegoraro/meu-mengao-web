CREATE TABLE
    partidas(
        id VARCHAR(255) PRIMARY KEY,
        data VARCHAR(255) NOT NULL,
        time_casa VARCHAR(255) NOT NULL,
        time_fora VARCHAR(255) NOT NULL,
        escudo_casa MEDIUMBLOB NOT NULL,
        escudo_fora MEDIUMBLOB NOT NULL,
        gols_casa VARCHAR(255) NOT NULL,
        gols_fora VARCHAR(255) NOT NULL,
        campeonato VARCHAR(255) NOT NULL,
        campeonato_id VARCHAR(255) NOT NULL,
        partida_flamengo BOOLEAN NOT NULL,
        rodada_name VARCHAR(255),
        rodada_index INT
    );