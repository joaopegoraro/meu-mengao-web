<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
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
                    <button class="main-nav-app-button">Baixe o aplicativo</button>
                </nav>
            </div>
        </div>
    </header>

    <main>
        <div class="container">
            <div class="main">
                <section class="article-list | flow" style="--flow-space: 2em">
                    <h1 class="fs-primary-heading fw-bold">Notícias</h1>
                    <ul class="flow" style="--flow-space: 3em" role="list" aria-label="Notícias">
                        <?php for ($i = 0; $i < 10; $i++) : ?>
                            <li>
                                <article>
                                    <a class="article-link" href=<?= '/' . $i ?>>
                                        <img class="article-image" src="https://colunadofla.com/wp-content/uploads/2023/08/elenco-time-jogadores-poster-flamengo-brasileirao.jpg" alt="Time do flamengo entrando em campo">
                                        <div class="article-content">
                                            <p>Globo Esporte</p>
                                            <h2 class="fw-bold fs-secondary-heading" style="--flow-space: 0.5rem">
                                                Flamengo escolhe Cariacica para jogar contra o Athletico
                                            </h2>
                                        </div>
                                    </a>
                                </article>
                            </li>
                        <?php endfor ?>
                    </ul>
                </section>

                <aside class="flow" style="--flow-space: 2em">
                    <section class="next-match-section | flow" style="--flow-space: 1em">
                        <h2 class="fs-primary-heading fw-bold">Próxima Partida</h2>
                        <div class="next-match-card">
                            <div class="next-match-card-content | flow" style="--flow-space: 1em">
                                <p>Flamengo</p>
                                <p>Vasco</p>
                            </div>
                            <div class="next-match-card-footer">
                                <p class="next-match-round">Série A<br />Rodada 22</p>
                                <p class="next-match-date">sábado 19:00</p>
                            </div>
                        </div>
                    </section>

                    <section class="table-section">
                        <h2 class="fs-primary-heading fw-bold">Tabela Brasileirão</h2>
                        <table>
                            <tr>
                                <th class="position-header" colspan="3">Classificação</th>
                                <th class="points-header">P</th>
                                <th class="games-header">J</th>
                                <th class="wins-header">V</th>
                            </tr>
                            <?php for ($pos = 0; $pos < 10; $pos++) : ?>
                                <tr>
                                    <td class="position"><?= $pos + 1 ?></td>
                                    <td class="team-name" colspan="2">Red Bull Bragantino <?= $pos ?></td>
                                    <td class="points"><?= (15 - $pos) * 2 ?></td>
                                    <td class="games">15</td>
                                    <td class="wins"><?= 15 - $pos ?></td>
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