CREATE TABLE
    posicoes(
        id VARCHAR(255) PRIMARY KEY,
        posicao VARCHAR(255) NOT NULL,
        nome_time VARCHAR(255) NOT NULL,
        escudo_time TEXT NOT NULL,
        pontos VARCHAR(255) NOT NULL,
        jogos VARCHAR(255) NOT NULL,
        vitorias VARCHAR(255) NOT NULL,
        empates VARCHAR(255) NOT NULL,
        derrotas VARCHAR(255) NOT NULL,
        gols_feitos VARCHAR(255) NOT NULL,
        gols_sofridos VARCHAR(255) NOT NULL,
        saldo_gols VARCHAR(255) NOT NULL,
        campeonato_id VARCHAR(255) NOT NULL,
        classificacao_name VARCHAR(255) NOT NULL,
        classificacao_index INT NOT NULL
    );