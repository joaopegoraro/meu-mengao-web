CREATE TABLE
    noticias(
        id BIGINT(11) AUTO_INCREMENT PRIMARY KEY,
        link VARCHAR(255) NOT NULL,
        titulo VARCHAR(255) NOT NULL,
        data VARCHAR(255) NOT NULL,
        site VARCHAR(255) NOT NULL,
        logo_site TEXT NOT NULL,
        foto TEXT NOT NULL,
        foto_base_64 MEDIUMBLOB NOT NULL
    );