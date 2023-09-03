<?php

use App\Model\Partida;

/**
 * @var string $partidasTitle
 * @var bool $mostrarPlacar
 * @var Partida[] $partidas 
 */
?>

<main class="l-container">
    <div class="l-grid" style="--grid-gap: 2rem">
        <h1><?= $partidasTitle ?></h1>
        <div class="c-partidas">
            <?php foreach ($partidas as $partida) : ?>
                <?php include 'partida.php' ?>
            <?php endforeach ?>
        </div>
    </div>
</main>