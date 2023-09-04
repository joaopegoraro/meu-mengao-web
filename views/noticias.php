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
        <section class="l-article-list u-flow" style="--flow-space: 2rem">
            <h1>Notícias</h1>
            <ul class="u-nested-flow" role="list" aria-label="Notícias" style="--nested-flow-space: 3rem">
                <?php foreach ($noticias as $noticia) : ?>
                <li>
                    <article>
                        <a class="anchor--light" href="<?= htmlspecialchars($noticia->link) ?>">
                            <img class="c-article__image" src="<?= $noticia->foto ?>" alt="" decoding="async">
                            <div class="c-article__content u-flow" style="--flow-space: 0.2rem">
                                <p class="c-article__site"
                                    style="--icon-url: url('data:image/png;base64,<?= $noticia->logoSite ?>');">
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

        <aside class="l-noticias-aside u-flow" style="--flow-space: 2rem">
            <section class="u-nested-flow" style="--nested-flow-space: 2rem;">
                <a class="anchor--dark anchor--big" href="/calendario">
                    Próxima Partida
                </a>
                <?php
                $partida = $proximaPartida;
                include 'components/partida.php';
                ?>
            </section>

            <section class="u-nested-flow" style="--nested-flow-space: 1rem;">
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