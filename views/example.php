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
            <div class="main-nav-wrapper">
                <nav class="main-nav" aria-label="Navegação principal">
                    <ul role="list">
                        <li><a href="/noticias">Notícias</a></li>
                        <li><a href="/resultados">Resultados</a></li>
                        <li><a href="/calendario">Calendário</a></li>
                        <li><a href="/tabelas">Tabelas</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="main-columns">
            <section class="article-list">
                <ul role="list" aria-label="Notícias">
                    <?php for ($i = 0; $i < 10; $i++) : ?>
                        <li>
                            <article>
                                <a href=<?= '/' . $i ?>>
                                    <img class="article-image" src="https://colunadofla.com/wp-content/uploads/2023/08/elenco-time-jogadores-poster-flamengo-brasileirao.jpg" alt="Time do flamengo entrando em campo">
                                    <h2 class="article-title">Notícia <?= $i ?></h2>
                                    <p></p>
                                </a>
                            </article>
                        </li>
                    <?php endfor ?>
                </ul>
            </section>

            <aside>
                <section class="next-match-section">
                    <h2 class="next-match-title">Próxima Partida</h2>
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