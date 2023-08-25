<main>
    <div class="container">
        <div class="main | flow" style="--flow-space: 2em">
            <h1 class="fs-primary-heading fw-bold">Resultados</h1>
            <div class="partidas">
                <?php foreach ($partidas as $partida) : ?>
                <?= $partida ?>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</main>