<?php

use App\Model\Noticia;

/**
 * @var Noticia[] $noticias
 * @var mixed $nextMatch A view que representa a próxima partida
 * @var mixed $tabelaBrasileirao A view que representa a tabela do brasileirão
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
                                    <img class="article-image" src="<?= htmlspecialchars($noticia->foto) ?>" alt="">
                                    <div class="article-content | flow" style="--flow-space: 0.2em">
                                        <p class="article-site | fw-semi-bold" style="--icon-url: url('<?= htmlspecialchars($noticia->logoSite) ?>');">
                                            <?= htmlspecialchars($noticia->site) ?>
                                        </p>
                                        <h2 class="fw-bold fs-secondary-heading">
                                            <?= htmlspecialchars($noticia->titulo) ?>
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
                        <?= $nextMatch ?>
                    </div>
                </section>

                <section class="table-section">
                    <a href="/tabelas" class="main-heading-link | fs-primary-heading fw-bold">
                        Tabela Brasileirão
                    </a>
                    <?= $tabelaBrasileirao ?>
                </section>
        </div>
    </div>
</main>