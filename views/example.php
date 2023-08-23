<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Meu Mengão - Agregador de notícias do Flamengo</title>
    <link rel="stylesheet" href="css/noticias.css">
</head>

<body>
    <header role="banner">
        <div class="container">
            <div class="main-nav-wrapper | padding-block-600">
                <nav class="main-nav | fw-bold" aria-label="Navegação principal">
                    <ul role="list" class="main-nav-list">
                        <li><a class="main-nav-link" href="/noticias">Notícias</a></li>
                        <li><a class="main-nav-link" href="/resultados">Resultados</a></li>
                        <li><a class="main-nav-link" href="/calendario">Calendário</a></li>
                        <li><a class="main-nav-link" href="/tabelas">Tabelas</a></li>
                    </ul>
                    <button class="main-nav-app-button">Baixe nosso aplicativo</button>
                </nav>
            </div>
        </div>
    </header>

    <main>
        <div class="container">
            <div class="main-columns">
                <section class="article-list | flow" style="--flow-space: 2em">
                    <h1 class="fs-primary-heading fw-bold">Notícias</h1>
                    <ul class="flow" style="--flow-space: 3em" role="list" aria-label="Notícias">
                        <?php for ($i = 0; $i < 10; $i++) : ?>
                        <li>
                            <article>
                                <a class="article-link" href=<?= '/' . $i ?>>
                                    <img class="article-image"
                                        src="https://colunadofla.com/wp-content/uploads/2023/08/elenco-time-jogadores-poster-flamengo-brasileirao.jpg"
                                        alt="Time do flamengo entrando em campo">
                                    <div class="article-content">
                                        <p>Globo Esporte</p>
                                        <h2 class="fw-bold fs-secondary-heading" style="--flow-space: 0.5rem">
                                            <?php if ($i % 2 == 0) {
                                                    echo "Flamengo escolhe Cariacica para jogar contra o Athletico";
                                                } else if ($i % 3 == 0) {
                                                    echo "Flamengo";
                                                } else {
                                                    echo "Flamengo escolhe Cariacica para jogar contra o Athletico Flamengo escolhe Cariacica para jogar contra o Athletico";
                                                }
                                                ?>
                                        </h2>
                                    </div>
                                </a>
                            </article>
                        </li>
                        <?php endfor ?>
                    </ul>
                </section>

                <aside>
                    <section class="next-match-section">
                        <h2 class="fs-primary-heading fw-bold padding-block-600">Próxima Partida</h2>
                        <div class="next-match-card">
                            <div class="next-match-card-content">
                                <p class="home-team">Flamengo</p>
                                <p class="away-team">Vasco</p>
                            </div>
                            <div class="next-match-card-footer">
                                <p class="next-match-round">Série A Rodada 22</p>
                                <p class="next-match-date">sábado 19:00</p>
                            </div>
                        </div>
                    </section>

                    <section class="table-section">
                        <h2 class="table-title">Tabela Brasileirão</h2>
                        <table>
                            <tr class="table-header-row">
                                <th>#</th>
                                <th>Classificação</th>
                                <th>P</th>
                                <th>J</th>
                                <th>V</th>
                            </tr>
                            <?php for ($pos = 0; $pos < 10; $pos++) : ?>
                            <tr class="table-body-row">
                                <th><?= $pos ?></th>
                                <th>Time <?= $pos ?></th>
                                <th><?= (15 - $pos) * 2 ?></th>
                                <th>15</th>
                                <th><?= 15 - $pos ?></th>
                            </tr>
                            <?php endfor ?>
                        </table>
                    </section>
            </div>
        </div>
    </main>

    <footer>
        <div class="container">
            <nav>
                <ul role="list" aria-label="Informações do site">
                    <li id="contact-nav"><a href="/">Contato</a> </li>
                    <li id="source-nav"><a href="/">Código Fonte</a></li>
                    <li id="app-nav"><a href="/">Aplicativo</a></li>
                </ul>
            </nav>
        </div>
    </footer>
</body>

</html>