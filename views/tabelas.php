<?php

use App\Model\Campeonato;

/**
 * @var Campeonato $campeonatoSelecionado
 * @var Campeonato[] $campeonatos
 * @var int $rodadaIndex
 * @var string $rodadaName
 * @var Partida[] $rodadas 
 * @var array $tabelas 
 */
?>

<main class="l-container">
    <div class="l-tables-grid<?php if (!$campeonatoSelecionado->possuiClassificacao) echo ' l-tables-grid--no-table' ?>">
        <section class="l-championship-tables">

            <div class="c-tables-dropdown" tabindex=0>
                <h1 class="c-tables-dropdown__title">
                    <?= $campeonatoSelecionado->nome ?? 'Campeonato' ?>
                </h1>
                <div class="c-tables-dropdown__content">
                    <?php foreach ($campeonatos as $campeonato) : ?>
                        <a class="c-tables-dropdown__item anchor--light" href="?id=<?= $campeonato->id ?>">
                            <?= $campeonato->nome ?>
                        </a>
                    <?php endforeach ?>
                </div>
            </div>

            <?php if ($campeonatoSelecionado->possuiClassificacao) : ?>
                <div class="l-table-list">
                    <?php
                    $tabelaCompleta = true;
                    foreach ($tabelas as $classificacaoName => $posicoes) :
                        unset($posicoes['index']);
                        include 'components/tabela.php';
                        if ($classificacaoName < array_key_last($tabelas)) echo '<hr>';
                    endforeach;
                    ?>
                </div>
            <?php endif ?>
        </section>


        <section class="l-championship-rounds">
            <?php if ($campeonatoSelecionado->possuiClassificacao) : ?>
                <hr class="ruler--mobile">
            <?php endif ?>

            <div class="c-round-selector">
                <?php if ($rodadaIndex > 0) : ?>
                    <a href="?id=<?= $campeonatoSelecionado->id ?>&round=<?= $rodadaIndex - 1 ?>#rounds" title="Ver rodada anterior">
                        <div class="c-arrow-left"></div>
                    </a>
                <?php endif ?>

                <h1 class="u-text-center"><?= $rodadaName ?></h1>

                <?php if ($rodadaIndex < $campeonatoSelecionado->rodadaFinal) : ?>
                    <a href="?id=<?= $campeonatoSelecionado->id ?>&round=<?= $rodadaIndex + 1 ?>#rounds" title="Ver próxima rodada">
                        <div class="c-arrow-right"></div>
                    </a>
                <?php endif ?>
            </div>

            <div class="l-round-list<?php if (!$campeonatoSelecionado->possuiClassificacao) echo ' l-round-list--no-table' ?>">
                <?php
                $esconderCampeonato = true;
                $mostrarPlacar = true;
                foreach ($rodadas as $partida) :
                    include 'components/partida.php';
                endforeach;
                ?>
            </div>

        </section>
    </div>
</main>