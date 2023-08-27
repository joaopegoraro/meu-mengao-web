<?php

/**
 * @var string $title The \<head\> title of the page
 * @var mixed[] $styles The stylesheet name (without the trailing extension '.css')
 * @var mixed $content The main content of the page
 */
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Meu Mengão - <?= $title ? htmlspecialchars($title) : "Agregador de notícias do Flamengo" ?></title>
    <link rel="stylesheet" href="css/base.css">
    <?php foreach ($styles as $style) : ?>
        <link rel="stylesheet" href="css/<?= htmlspecialchars($style) ?>.css">
    <?php endforeach ?>
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
                    <a href="https://play.google.com/store/apps/details?id=com.joaopegoraro.meu_mengao" target="_blank" class="main-nav-app-button">Baixe o aplicativo</a>
                </nav>
            </div>
        </div>
    </header>

    <?= $content ?>

    <footer>
        <div class="container">
            <nav>
                <ul class="footer-nav | fw-bold" role="list" aria-label="Informações do site">
                    <li><a class="footer-nav-link" href="https://github.com/joaopegoraro" target="_blank">Contato</a>
                    </li>
                    <li><a class="footer-nav-link" href="https://github.com/joaopegoraro/meu-mengao-web" target="_blank"">Código fonte</a> </li>
                    <li><a class=" footer-nav-link" href="https://play.google.com/store/apps/details?id=com.joaopegoraro.meu_mengao" target="_blank">Aplicativo</a></li>
                </ul>
            </nav>
        </div>
    </footer>
</body>

</html>