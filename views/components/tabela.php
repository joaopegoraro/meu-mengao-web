<?php

use App\Model\Posicao;

/**
 * @var string $classificacaoName
 * @var bool $tabelaCompleta
 * @var Posicao[] $posicoes
 */
?>

<div class="c-table">
    <?php if ($classificacaoName) : ?>
        <h2><?= $classificacaoName ?></h2>
    <?php endif ?>

    <table>
        <tr>
            <th colspan="3">Classificação</th>
            <th>P</th>
            <th class="<?php if (!$tabelaCompleta) echo 'table__optional-cell' ?>">J</th>
            <th class="<?php if (!$tabelaCompleta) echo 'table__optional-cell' ?>">V</th>
            <?php if ($tabelaCompleta) : ?>
                <th>E</th>
                <th>D</th>
                <th>GF</th>
                <th>GC</th>
                <th>SG</th>
            <?php endif ?>
        </tr>
        <?php foreach ($posicoes as $posicao) : ?>
            <tr>
                <td class="table__position"><?= $posicao->posicao ?></td>
                <td class="table__team-name" colspan="2" style="--icon-url: url('data:image/png;base64,<?= $posicao->escudoTime ?>');">
                    <span class="table__team-initials"><?= mb_substr($posicao->nomeTime, 0, 3, encoding: 'utf-8') ?></span><span class="table__team-non-initials"><?= mb_substr($posicao->nomeTime, 3, encoding: 'utf-8') ?></span>
                </td>
                <td class="table__points"><?= $posicao->pontos ?></td>
                <td class="<?php if (!$tabelaCompleta) echo 'table__optional-cell' ?>"><?= $posicao->jogos ?></td>
                <td class="<?php if (!$tabelaCompleta) echo 'table__optional-cell' ?>"><?= $posicao->vitorias ?></td>
                <?php if ($tabelaCompleta) : ?>
                    <td><?= $posicao->empates ?></td>
                    <td><?= $posicao->derrotas ?></td>
                    <td><?= $posicao->golsFeitos ?></td>
                    <td><?= $posicao->golsSofridos ?></td>
                    <td><?= $posicao->saldoGols ?></td>
                <?php endif ?>
            </tr>
        <?php endforeach ?>
    </table>
</div>