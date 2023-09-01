<?php

use App\Model\Partida;

/**
 * @var string $partidasTitle
 * @var bool $mostrarPlacar
 * @var Partida[] $partidas 
 */
?>

<main>
    <div class="container">
        <div class="main | flow" style="--flow-space: 2em">
            <h1 class="fs-primary-heading fw-bold"><?= $partidasTitle ?></h1>
            <div class="partidas">
                <?php foreach ($partidas as $partida) : ?>
                    <?php include 'partida.php' ?>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</main>