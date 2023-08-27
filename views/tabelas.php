<?php

use App\Model\Campeonato;

/**
 * @var string $campeonatoName
 * @var Campeonato[] $campeonatos
 * @var int $rodadaIndex
 * @var string $rodadaName
 * @var int $rodadaFinal
 * @var mixed $rodadaViews As views que representam as rodadas
 * @var mixed $tabelaViews As views que representam as tabelas
 */
?>

<main>
    <div class="container">
        <div class="main">
            <section class="championship-tables | flow" style="--flow-space: 2em">

                <div class="tables-dropdown" tabindex=0>
                    <h1 class="tables-dropdown-title | fs-primary-heading fw-bold">
                        <?= $campeonatoName ?? 'Campeonato' ?>
                    </h1>
                    <div class="tables-dropdown-content">
                        <?php foreach ($campeonatos as $campeonato) : ?>
                            <a class="tables-dropdown-item" href="?id=<?= $campeonato->id ?>">
                                <?= $campeonato->nome ?>
                            </a>
                        <?php endforeach ?>
                    </div>
                </div>

                <div class="table-list | flow" style="--flow-space: 3em">
                    <?php foreach ($tabelaViews as $index => $tabelaView) : ?>

                        <?= $tabelaView ?>

                        <?php if ($index < array_key_last($tabelaViews)) : ?>
                            <hr class="table-divider">
                        <?php endif ?>

                    <?php endforeach ?>
                </div>
            </section>


            <section class="championship-rounds | flow" style="--flow-space: 4em">
                <hr class="mobile-ruler">

                <div class="round-selector">
                    <div class="round-arrow-link-wrapper">
                        <?php if ($rodadaIndex > 0) : ?>
                            <a class="round-arrow-link" href="?id=<?= $campeonato->id ?>&round=<?= $rodadaIndex - 1 ?>" title="Ver rodada anterior">
                                <div class="arrow-left"></div>
                            </a>
                        <?php endif ?>
                    </div>
                    <h1 class="round-title | fs-primary-heading fw-bold">
                        <?= $rodadaName ?>
                    </h1>
                    <div class="round-arrow-link-wrapper">
                        <?php if ($rodadaIndex < $rodadaFinal) : ?>
                            <a class="round-arrow-link" href="?id=<?= $campeonato->id ?>&round=<?= $rodadaIndex + 1 ?>" title="Ver próxima rodada">
                                <div class="arrow-right"></div>
                            </a>
                        <?php endif ?>
                    </div>
                </div>

                <div class="round-list | flow" style="--flow-space: 2em">
                    <?php foreach ($rodadaViews as $rodadaView) : ?>
                        <?= $rodadaView ?>
                    <?php endforeach ?>
                </div>

            </section>
        </div>
    </div>
</main>