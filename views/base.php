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

    <link rel="stylesheet" href="css/base.css?v=1">

    <link rel="preload" fetchpriority="low" as="image" href="images/logo-200.webp" type="image/webp">
    <link rel="preload" fetchpriority="low" as="image" href="images/playstore-25.webp" type="image/webp">
</head>

<body>
    <header role="banner">
        <div class="container">
            <div class="main-nav-wrapper | padding-block-600">
                <nav class="main-nav | fw-bold" aria-label="Navegação principal">
                    <ul role="list" class="main-nav-list">
                        <li><a class="main-nav-link" href="/noticias">Notícias</a></li>
                        <li><a class="main-nav-link" href="/resultados">Resultados</a></li>
                        <li><a class="main-nav-link" href="/calendario">Calendário</a></li>
                        <li><a class="main-nav-link" href="/tabelas">Tabelas</a></li>
                    </ul>
                    <a href="https://play.google.com/store/apps/details?id=com.joaopegoraro.meu_mengao" target="_blank"
                        class="main-nav-app-button">Baixe o aplicativo</a>
                </nav>
            </div>
        </div>
    </header>

    <?php
    foreach ($data as $key => $value) {
        $$key = $value;
    }
    include($content . '.php')
    ?>

    <footer>
        <div class="container">
            <nav>
                <ul class="footer-nav | fw-bold" role="list" aria-label="Informações do site">
                    <li><a class="footer-nav-link" href="https://github.com/joaopegoraro" target="_blank">Contato</a>
                    </li>
                    <li><a class="footer-nav-link" href="https://github.com/joaopegoraro/meu-mengao-web" target="_blank"">Código fonte</a> </li>
                    <li><a class=" footer-nav-link"
                            href="https://play.google.com/store/apps/details?id=com.joaopegoraro.meu_mengao"
                            target="_blank">Aplicativo</a></li>
                </ul>
            </nav>
        </div>
    </footer>
</body>

<link rel="icon" type="image/x-icon" href="icons/favicon.ico?v=1">
<?php foreach ($styles as $style) : ?>
<link rel="stylesheet" href="css/<?= htmlspecialchars($style) ?>.css?v=1">
<?php endforeach ?>

</html>