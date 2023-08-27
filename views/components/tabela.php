<?php

use App\Model\Posicao;

/**
 * @var string $classificacaoName
 * @var bool $tabelaCompleta
 * @var Posicao[] $posicoes
 */
?>

<div class="table-championship">
    <?php if ($classificacaoName) : ?>
        <h2 class="fs-secondary-heading fw-bold"><?= $classificacaoName ?></h2>
    <?php endif ?>

    <table>
        <tr>
            <th class="table-position-header" colspan="3">Classificação</th>
            <th class="table-points-header">P</th>
            <th class="table-games-header">J</th>
            <th class="table-wins-header">V</th>
            <?php if ($tabelaCompleta) : ?>
                <th class="table-draws-header">E</th>
                <th class="table-losses-header">D</th>
                <th class="table-goals-scored-header">GF</th>
                <th class="table-goals-conceived-header">GC</th>
                <th class="table-goal-diff-header">SG</th>
            <?php endif ?>
        </tr>
        <?php foreach ($posicoes as $posicao) : ?>
            <tr>
                <td class="table-position"><?= htmlspecialchars($posicao->posicao) ?></td>
                <td class="table-team-name" colspan="2" style="--icon-url: url('<?= htmlspecialchars($posicao->escudoTime) ?>');">
                    <?= htmlspecialchars($posicao->nomeTime) ?>
                </td>
                <td class="table-points"><?= htmlspecialchars($posicao->pontos) ?></td>
                <td class="table-games"><?= htmlspecialchars($posicao->jogos) ?></td>
                <td class="table-wins"><?= htmlspecialchars($posicao->vitorias) ?></td>
                <?php if ($tabelaCompleta) : ?>
                    <td class="table-draws"><?= htmlspecialchars($posicao->empates) ?></td>
                    <td class="table-losses"><?= htmlspecialchars($posicao->derrotas) ?></td>
                    <td class="table-goals-scored"><?= htmlspecialchars($posicao->golsFeitos) ?></td>
                    <td class="table-goals-conceived"><?= htmlspecialchars($posicao->golsSofridos) ?></td>
                    <td class="table-goal-diff"><?= htmlspecialchars($posicao->saldoGols) ?></td>
                <?php endif ?>
            </tr>
        <?php endforeach ?>
    </table>
</div>