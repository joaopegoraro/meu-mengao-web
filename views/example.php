<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Meu Mengão - Agregador de notícias do Flamengo</title>
    <link rel="stylesheet" href="css/example.css">
</head>

<body>
    <header role="banner">
        <nav>
            <ul>
                <li id="home-nav"><a href="/" title="Pagina Inicial">Meu Mengão</a> </li>
                <li id="articles-nav"><a href="/noticias">Notícias</a></li>
                <li id="results-nav"><a href="/resultados">Resultados</a></li>
                <li id="calendar-nav"><a href="/calendario">Calendário</a></li>
                <li id="tables-nav"><a href="/tabelas">Tabelas</a></li>
            </ul>
        </nav>
    </header>

    <section class="article-list">
        <?php for ($i = 0; $i < 10; $i++) : ?>
            <article id=<?= 'article' . $i ?>>
                <a href=<?= '/' . $i ?>>
                    <img class="article-image" src="https://colunadofla.com/wp-content/uploads/2023/08/elenco-time-jogadores-poster-flamengo-brasileirao.jpg" alt="Time do flamengo entrando em campo">
                    <h2 class="article-title">Notícia <?= $i ?></h2>
                </a>
            </article>
        <?php endfor ?>
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

        <footer>
            <div class="footer_brand">
                <img class="footer-logo">
                <h3 class="footer-title">Meu Mengão</h3>
                <p class="footer-description">O melhor agregador de notícias do Mengão</p>
            </div>

            <nav>
                <ul>
                    <li id="contact-nav"><a href="/">Contato</a> </li>
                    <li id="source-nav"><a href="/">Código Fonte</a></li>
                </ul>
            </nav>

        </footer>
    </aside>
</body>

</html>