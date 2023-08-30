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
            <th class="table-games-header <?= $tabelaCompleta ? '' : 'optional-column' ?>">J</th>
            <th class="table-wins-header <?= $tabelaCompleta ? '' : 'optional-column' ?>">V</th>
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
                <td class="table-position"><?= $posicao->posicao ?></td>
                <td class="table-team-name" colspan="2" style="--icon-url: url('data:image/png;base64,<?= $posicao->escudoTime ?>');">
                    <span class="table-team-initials"><?= mb_substr($posicao->nomeTime, 0, 3, encoding: 'utf-8') ?></span><span class="table-team-non-initials"><?= mb_substr($posicao->nomeTime, 3, encoding: 'utf-8') ?></span>
                </td>
                <td class="table-points"><?= $posicao->pontos ?></td>
                <td class="table-games <?= $tabelaCompleta ? '' : 'optional-column' ?>">
                    <?= $posicao->jogos ?></td>
                <td class="table-wins <?= $tabelaCompleta ? '' : 'optional-column' ?>">
                    <?= $posicao->vitorias ?></td>
                <?php if ($tabelaCompleta) : ?>
                    <td class="table-draws"><?= $posicao->empates ?></td>
                    <td class="table-losses"><?= $posicao->derrotas ?></td>
                    <td class="table-goals-scored"><?= $posicao->golsFeitos ?></td>
                    <td class="table-goals-conceived"><?= $posicao->golsSofridos ?></td>
                    <td class="table-goal-diff"><?= $posicao->saldoGols ?></td>
                <?php endif ?>
            </tr>
        <?php endforeach ?>
    </table>
</div>