<?php

use App\Model\Partida;

/**
 * @var Partida $partida
 * @var bool $esconderCampeonato
 * @var bool $mostrarPlacar
 */

if (!isset($esconderCampeonato)) $esconderCampeonato = false;
if (!isset($mostrarPlacar)) $mostrarPlacar = false;
?>

<div class="c-match-card">
    <div class="c-match-card__content u-flow" style="--flow-space: 1rem">
        <div class="c-match-card__team" style="--icon-url: url('data:image/png;base64,<?= $partida->escudoCasa ?>');">
            <p class="c-match-card__team-name"><?= $partida->timeCasa ?></p>
            <?php if ($mostrarPlacar) : ?>
            <p><?= $partida->golsCasa == '-' ? '' : $partida->golsCasa ?></p>
            <?php endif ?>
        </div>
        <div class="c-match-card__team" style="--icon-url: url('data:image/png;base64,<?= $partida->escudoFora ?>');">
            <p class="c-match-card__team-name"><?= $partida->timeFora ?></p>
            <?php if ($mostrarPlacar) : ?>
            <p><?= $partida->golsFora == '-' ? '' : $partida->golsFora ?></p>
            <?php endif ?>
        </div>
    </div>
    <div class="c-match-card__footer <?= $esconderCampeonato ? 'c-match-card__footer--center' : '' ?>">
        <?php if (!$esconderCampeonato) : ?>
        <div class="c-match-card__round-wrapper">
            <p class="c-match-card__round">
                <?= $partida->campeonato ?>
                <br />
                <?= $partida->rodadaName ?>
            </p>
        </div>
        <?php endif ?>

        <div class="c-match-card__date-wrapper">
            <p class="c-match-card__date">
                <?php $date = $partida->getReadableDate(); ?>
                <?= $date['date'] ?>
                <br />
                <?= $date['time'] ?>
            </p>
        </div>
    </div>
</div>