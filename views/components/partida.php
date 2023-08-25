<?php

use App\Model\Partida;

/**
 * @var Partida $partida
 */
?>

<div class="match-card">
    <div class="match-card-content | flow" style="--flow-space: 1em">
        <div class="team" style="--icon-url: url('<?= htmlspecialchars($partida->escudoCasa) ?>');">
            <p class="team-name"><?= htmlspecialchars($partida->timeCasa) ?></p>
            <p class="team-score"><?= htmlspecialchars($partida->golsCasa) ?></p>
        </div>
        <div class="team" style="--icon-url: url('<?= htmlspecialchars($partida->escudoFora) ?>');">
            <p class="team-name"><?= htmlspecialchars($partida->timeFora) ?></p>
            <p class="team-score"><?= htmlspecialchars($partida->golsFora) ?></p>
        </div>
    </div>
    <div class="match-card-footer">
        <p class="match-round">
            <?= htmlspecialchars($partida->campeonato) ?>
            <br />
            <?= htmlspecialchars($partida->rodadaName) ?>
        </p>
        <p class="match-date">
            <?= htmlspecialchars($partida->data) ?>
        </p>
    </div>
</div>