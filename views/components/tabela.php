<?php

use App\Model\Posicao;

/**
 * @var Posicao[] $posicoes
 */
?>

<table>
    <tr>
        <th class="position-header" colspan="3">Classificação</th>
        <th class="points-header">P</th>
        <th class="games-header">J</th>
        <th class="wins-header">V</th>
    </tr>
    <?php foreach ($posicoes as $posicao) : ?>
    <tr>
        <td class="table-position"><?= htmlspecialchars($posicao->posicao) ?></td>
        <td class="table-team-name" colspan="2"
            style="--icon-url: url('<?= htmlspecialchars($posicao->escudoTime) ?>');">
            <?= htmlspecialchars($posicao->nomeTime) ?>
        </td>
        <td class="table-points"><?= htmlspecialchars($posicao->pontos) ?></td>
        <td class="table-games"><?= htmlspecialchars($posicao->jogos) ?></td>
        <td class="table-wins"><?= htmlspecialchars($posicao->vitorias) ?></td>
    </tr>
    <?php endforeach ?>
</table>