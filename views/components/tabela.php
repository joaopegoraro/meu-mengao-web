<?php

use App\Model\Posicao;

/**
 * @var string $classificacaoName
 * @var bool $tabelaCompleta
 * @var Posicao[] $posicoes
 */
?>

<div>
    <?php if ($classificacaoName) : ?>
        <h2><?= $classificacaoName ?></h2>
    <?php endif ?>

    <table>
        <tr>
            <th class="table__position-header" colspan="3">Classificação</th>
            <th class="table__points-header">P</th>
            <th class="table__games-header <?= $tabelaCompleta ? '' : 'table__optional-cell' ?>">J</th>
            <th class="table__wins-header <?= $tabelaCompleta ? '' : 'table__optional-cell' ?>">V</th>
            <?php if ($tabelaCompleta) : ?>
                <th class="table__draws-header">E</th>
                <th class="table__losses-header">D</th>
                <th class="table__goals-scored-header">GF</th>
                <th class="table__goals-conceived-header">GC</th>
                <th class="table__goal-diff-header">SG</th>
            <?php endif ?>
        </tr>
        <?php foreach ($posicoes as $posicao) : ?>
            <tr>
                <td class="table__position"><?= $posicao->posicao ?></td>
                <td class="table__team-name" colspan="2" style="--icon-url: url('data:image/png;base64,<?= $posicao->escudoTime ?>');">
                    <span class="table__team-initials"><?= mb_substr($posicao->nomeTime, 0, 3, encoding: 'utf-8') ?></span><span class="table__team-non-initials"><?= mb_substr($posicao->nomeTime, 3, encoding: 'utf-8') ?></span>
                </td>
                <td class="table__points"><?= $posicao->pontos ?></td>
                <td class="table__games <?= $tabelaCompleta ? '' : 'table__optional-cell' ?>">
                    <?= $posicao->jogos ?></td>
                <td class="table__wins <?= $tabelaCompleta ? '' : 'table__optional-cell' ?>">
                    <?= $posicao->vitorias ?></td>
                <?php if ($tabelaCompleta) : ?>
                    <td class="table__draws"><?= $posicao->empates ?></td>
                    <td class="table__losses"><?= $posicao->derrotas ?></td>
                    <td class="table__goals-scored"><?= $posicao->golsFeitos ?></td>
                    <td class="table__goals-conceived"><?= $posicao->golsSofridos ?></td>
                    <td class="table__goal-diff"><?= $posicao->saldoGols ?></td>
                <?php endif ?>
            </tr>
        <?php endforeach ?>
    </table>
</div>