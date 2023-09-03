<?php

use App\Model\Partida;

/**
 * @var string $partidasTitle
 * @var bool $mostrarPlacar
 * @var Partida[] $partidas 
 */
?>

<main class="l-container">
    <div class="u-flow" style="--flow-space: 2rem">
        <h1><?= $partidasTitle ?></h1>
        <div class="l-partidas-grid">
            <?php foreach ($partidas as $partida) : ?>
                <?php include 'partida.php' ?>
            <?php endforeach ?>
        </div>
    </div>
</main>