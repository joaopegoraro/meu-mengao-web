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

<main class="l-container">
    <div class="l-noticias-grid">
        <section class="l-article-list">
            <h1>Notícias</h1>
            <ul class="l-grid" style="--grid-gap: 3rem" role="list" aria-label="Notícias">
                <?php foreach ($noticias as $noticia) : ?>
                    <li>
                        <article>
                            <a class="anchor--light" href="<?= htmlspecialchars($noticia->link) ?>">
                                <img class="c-article__image" src="<?= $noticia->foto ?>" alt="" decoding="async">
                                <div class="c-article__content">
                                    <p class="c-article__site" style="--icon-url: url('data:image/png;base64,<?= $noticia->logoSite ?>');">
                                        <?= $noticia->site ?>
                                    </p>
                                    <h2><?= $noticia->titulo ?></h2>
                                </div>
                            </a>
                        </article>
                    </li>
                <?php endforeach ?>
            </ul>
        </section>

        <aside class="l-noticias-aside">
            <section class="l-next-match-section">
                <a class="anchor--dark anchor--big" href="/calendario">
                    Próxima Partida
                </a>
                <?php
                $partida = $proximaPartida;
                include 'components/partida.php';
                ?>
            </section>

            <section class="l-table-section">
                <a class="anchor--dark anchor--big" href="/tabelas?id=serie-a">
                    Tabela Brasileirão
                </a>
                <?php
                $posicoes = $tabelaBrasileirao;
                include 'components/tabela.php';
                ?>
            </section>
        </aside>
    </div>
</main>