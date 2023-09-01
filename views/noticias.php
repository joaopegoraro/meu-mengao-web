<?php

use App\Model\Noticia;
use App\Model\Partida;
use App\Model\Posicao;

/**
 * @var Noticia[] $noticias
 * @var Partida $proximaPartida 
 * @var Posicao[] $tabelaBrasileirao 
 */
?>

<main>
    <div class="container">
        <div class="main">
            <section class="article-list | flow" style="--flow-space: 2em">
                <h1 class="fs-primary-heading fw-bold">Notícias</h1>
                <ul class="flow" style="--flow-space: 3em" role="list" aria-label="Notícias">
                    <?php foreach ($noticias as $noticia) : ?>
                    <li>
                        <article>
                            <a class="article-link" href="<?= htmlspecialchars($noticia->link) ?>">
                                <img class="article-image" src="<?= $noticia->foto ?>" alt="" decoding="async">
                                <div class="article-content | flow" style="--flow-space: 0.2em">
                                    <p class="article-site | fw-semi-bold"
                                        style="--icon-url: url('data:image/png;base64,<?= $noticia->logoSite ?>');">
                                        <?= $noticia->site ?>
                                    </p>
                                    <h2 class="article-title | fw-bold fs-secondary-heading">
                                        <?= $noticia->titulo ?>
                                    </h2>
                                </div>
                            </a>
                        </article>
                    </li>
                    <?php endforeach ?>
                </ul>
            </section>

            <aside class="flow" style="--flow-space: 2em">
                <section class="next-match-section | flow" style="--flow-space: 1em">
                    <a href="/calendario" class="main-heading-link | fs-primary-heading fw-bold">
                        Próxima Partida
                    </a>
                    <div class="next-match-card">
                        <?php
                        $partida = $proximaPartida;
                        include 'components/partida.php';
                        ?>
                    </div>
                </section>

                <section class="table-section">
                    <a href="/tabelas?id=serie-a" class="main-heading-link | fs-primary-heading fw-bold">
                        Tabela Brasileirão
                    </a>
                    <?= $tabelaBrasileirao ?>
                    <?php
                    $posicoes = $tabelaBrasileirao;
                    include 'components/tabela.php';
                    ?>
                </section>
        </div>
    </div>
</main>