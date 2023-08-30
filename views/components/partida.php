<?php

use App\Model\Partida;

/**
 * @var Partida $partida
 * @var bool $esconderCampeonato
 * @var bool $mostrarPlacar
 */
?>

<div class="match-card">
    <div class="match-card-content | flow" style="--flow-space: 1em">
        <div class="team" style="--icon-url: url('data:image/png;base64,<?= $partida->escudoCasa ?>');">
            <p class="team-name"><?= $partida->timeCasa ?></p>
            <?php if ($mostrarPlacar) : ?>
            <p class="team-score"><?= $partida->golsCasa ?></p>
            <?php endif ?>
        </div>
        <div class="team" style="--icon-url: url('data:image/png;base64,<?= $partida->escudoFora ?>');">
            <p class="team-name"><?= $partida->timeFora ?></p>
            <?php if ($mostrarPlacar) : ?>
            <p class="team-score"><?= $partida->golsFora ?></p>
            <?php endif ?>
        </div>
    </div>
    <div class="match-card-footer" <?= $esconderCampeonato ? "role='center'" : '' ?>>
        <?php if (!$esconderCampeonato) : ?>
        <p class="match-round">
            <?= $partida->campeonato ?>
            <br />
            <?= $partida->rodadaName ?>
        </p>
        <?php endif ?>

        <p class="match-date">
            <?= $partida->getReadableDate() ?>
        </p>
    </div>
</div>