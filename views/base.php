<?php

/**
 * @var string $title The \<head\> title of the page
 * @var string[] $styles The stylesheet names (without the trailing extension '.css')
 * @var string $content The name of view to be the main content of the page (without the trailing extension '.php')
 * @var array $data The variables to be used by the $content
 */
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="description" content="<?= $description ?>">

    <title>Meu Mengão - <?= $title ? htmlspecialchars($title) : "Agregador de notícias do Flamengo" ?></title>

    <link rel="stylesheet" href="css/style.css?v=1">

    <link rel="preload" fetchpriority="low" as="image" href="images/logo-200.webp" type="image/webp">
    <link rel="preload" fetchpriority="low" as="image" href="images/playstore-25.webp" type="image/webp">

    <link rel="icon" type="image/x-icon" href="icons/favicon.ico?v=1">
</head>

<body>
    <header class="l-container" role="banner">
        <nav class="c-main-nav" aria-label="Navegação principal">
            <ul class="c-main-nav__list" role="list">
                <li><a class="anchor--light" href="/noticias">Notícias</a></li>
                <li><a class="anchor--light" href="/resultados">Resultados</a></li>
                <li><a class="anchor--light" href="/calendario">Calendário</a></li>
                <li><a class="anchor--light" href="/tabelas">Tabelas</a></li>
            </ul>
            <a class="c-main-nav__button" href="https://play.google.com/store/apps/details?id=com.joaopegoraro.meu_mengao" target="_blank">Baixe o
                aplicativo</a>
        </nav>
    </header>

    <?php
    foreach ($data as $key => $value) {
        $$key = $value;
    }
    include($content . '.php')
    ?>

    <footer class="l-container">
        <nav>
            <ul class="c-footer-nav" role="list" aria-label="Informações do site">
                <li><a class="anchor--dark" href="https://github.com/joaopegoraro" target="_blank">Contato</a></li>
                <li><a class="anchor--dark" href="https://github.com/joaopegoraro/meu-mengao-web" target="_blank">Código
                        fonte</a> </li>
                <li><a class="anchor--dark" href="https://play.google.com/store/apps/details?id=com.joaopegoraro.meu_mengao" target="_blank">Aplicativo</a></li>
            </ul>
        </nav>
    </footer>
</body>

</html>