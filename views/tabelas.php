<?php

use App\Model\Campeonato;
use App\Model\Partida;
use App\Model\Posicao;

/**
 * @var string $campeonatoName
 * @var Campeonato[] $campeonatos
 * @var int $rodadaIndex
 * @var string $rodadaName
 * @var mixed $rodadaViews As views que representam as rodadas
 * @var mixed $tabelaViews As views que representam as tabelas
 */
?>

<main>
    <div class="container">
        <div class="main">
            <section class="championship-tables">
                <div class="tables-dropdown" tabindex=0>
                    <h1 class="tables-dropdown-title | fs-primary-heading fw-bold">
                        <?= $campeonatoName ?? 'Campeonato' ?>
                    </h1>
                    <div class="tables-dropdown-content">
                        <?php foreach ($campeonatos as $campeonato) : ?>
                            <a class="tables-dropdown-item" href="?id=<?= $campeonato->id ?>&round=<?= $rodadaIndex ?>">
                                <?= $campeonato->nome ?>
                            </a>
                        <?php endforeach ?>
                    </div>
                </div>
                <div class="table-list">
                    <?php foreach ($tabelaViews as $tabelaView) : ?>
                        <?= $tabelaView ?>
                    <?php endforeach ?>
                </div>
            </section>

            <section class="championship-rounds">
                <h1 class="fs-primary-heading fw-bold">
                    <?= $rodadaName ?>
                </h1>
                <div class="round-list">
                    <?php foreach ($rodadaViews as $rodadaView) : ?>
                        <?= $rodadaView ?>
                    <?php endforeach ?>
                </div>
            </section>
        </div>
    </div>
</main>