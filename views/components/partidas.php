<?php

/**
 * @var string $partidasTitle
 * @var mixed $partidas A view que representa uma partida
 */
?>

<main>
    <div class="container">
        <div class="main | flow" style="--flow-space: 2em">
            <h1 class="fs-primary-heading fw-bold"><?= htmlspecialchars($partidasTitle) ?></h1>
            <div class="partidas">
                <?php foreach ($partidas as $partidaView) : ?>
                    <?= $partidaView ?>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</main>