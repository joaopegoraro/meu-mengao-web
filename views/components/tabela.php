<?php

use App\Model\Posicao;

/**
 * @var string $classificacaoName
 * @var bool $tabelaCompleta
 * @var Posicao[] $posicoes
 */

if (!isset($classificacaoName)) $classificacaoName = null;
if (!isset($tabelaCompleta)) $tabelaCompleta = false;
?>

<div class="c-table">

    <table>
        <?php if ($classificacaoName && $classificacaoName != 'Equipe') : ?>
            <caption><?= $classificacaoName ?></caption>
        <?php endif ?>
        <thead>
            <tr>
                <th colspan="3">Classificação</th>
                <th aria-label="Pontos">P</th>
                <th aria-label="Jogos" class="<?php if (!$tabelaCompleta) echo 'table__optional-cell' ?>">J</th>
                <th aria-label="Vitórias" class="<?php if (!$tabelaCompleta) echo 'table__optional-cell' ?>">V</th>
                <?php if ($tabelaCompleta) : ?>
                    <th aria-label="Empates">E</th>
                    <th aria-label="Derrotas">D</th>
                    <th aria-label="Gols Feitos">GF</th>
                    <th aria-label="Gols Contra">GC</th>
                    <th aria-label="Saldo de Gols">SG</th>
                <?php endif ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($posicoes as $posicao) : ?>
                <tr>
                    <td class="table__position"><?= $posicao->posicao ?></td>
                    <td class="table__team-name <?php if (!$tabelaCompleta) echo 'u-text-start' ?>" colspan="2" style="--icon-url: url('data:image/png;base64,<?= $posicao->escudoTime ?>');">
                        <?php if ($tabelaCompleta) : ?>
                            <span class="table__team-initials"><?= mb_substr($posicao->nomeTime, 0, 3, encoding: 'utf-8') ?></span><span class="table__team-non-initials"><?= mb_substr($posicao->nomeTime, 3, encoding: 'utf-8') ?></span>
                        <?php else : ?>
                            <?= $posicao->nomeTime ?>
                        <?php endif ?>
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
        </tbody>
    </table>
</div>