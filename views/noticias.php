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
                                <img class="article-image"
                                    src="https://colunadofla.com/wp-content/uploads/2023/08/elenco-time-jogadores-poster-flamengo-brasileirao.jpg"
                                    alt="Time do flamengo entrando em campo">
                                <div class="article-content | flow" style="--flow-space: 0.2em">
                                    <p class="article-site | fw-semi-bold"
                                        style="--icon-url: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAE3ElEQVR4AbxWA3QtSxDcaJNv27Zt/+Dbtm3btm1dxbZt27ad+l1zso8Xz5XTZ+5mert6umtmR1OA5saB8DL5H+Zt8/9At/hnev3n16Gb/CZ0k++8jFg9U+9MMAZjMSZjk2N5TuOH6Srd2xrwnm4NGNNDL4QeFADd6g/dzGBrZnyXMRiLMRmbHOQyuEnsochN/uF69CWLhL5zagX/+S2sKblhjMFYjMnY5CAXORU3IWV6T4+5hMTT64TUeTLT5CKnRsjEwbrZf0pKJas2yNerLZCLnOTWvE2+H+uhF6iy02FDGLnISW5NHnJEJKpPGzCBeXKSm/3voFJd9J7CsT+3Br7kIie5NbXPzY4DbWy+QP32/M8XPmZ/bGQO4Mg5jo58OfKZPg63KLk1R6X3ESK3f8+D9uepKuBmloug/XM2tL/PgBr/PVeNhq/7f4bv+cqXo/bXqRLjXM47bIXmiFz75yzsHHQ1Pqg0IbuvElUjLYjpyoNv0jN4ufRXpPaU4pXS3+D2zzmSzDnYMfBKvFvxDzJ6y1Epvhl95fi42oLdQq5jLIdJaHZXLis7JOI2NIx2YkUsyN/0/AyI1N5SaH+chIPFt3akDfbQMt6DwyPvhLuRhLMEvMW8TL7YWMbCwToYKBtuwh8N0cjurwIxtzCvLLwjG55/n4mCgVoQ43NT+LImCNdmvIGva0MwtZho4UAdNmJscjhLgKLR/joN12S8CQOmlmRsLBpgf93/Pguf1dhg4L+WJJyf/CyI+YUFPFv8A7TfjxednCnjifis2qb+T1yc+rLEPp0idp4AiZg9Sz05N40DpbwU3ubWi+Emvd428Ar0TA2C+Ks5Hq+X/UFfqcgcKoabUT7UhOqRVpQNNaJ2tF1VivPvV/7H2ORwncA/zQkgeqeGsa3tclU6tfUke66gXFqiEmiKx6eySoIJ2APJiW9kUaucwEdVZvUisz874Ukp5wlCzLlTVEXGZidB/C0VeL74J/qqUt+b9wmOkPkz4x/HKXGP4Iiou3FszP04MfZB7BB0Fbemcw1wdSz3uYlPL/Z1XpXyhJj7sIXMHRx+C5J7ihUhYRZ9HBfz4BLfyI4cJWDtt2PFjsGFKS8gQoQa11WAi1JehNtfZzjXAM1bSs0t868IzMCslLdO+kpNLFvWqM5c2YYnwtaaCgMtEz2qNdEytyyOjLpH4p4NH5cJmHhGn48t5DT7vTFWlXZZpMne75jsBxHWnqVatpX1EgS2pcEeeqeGcHnaK9wBrs+BZZNgYO2341UPHy/8RqndT07BvUNvxNDMmKrCLw1Ratuyr5qciBdKmSk2bk8K+bniH7GP+LOtq3wS8iCiWL6rC8MtWe+rl7VfjqJRhFKVGBi4M+cjlegmlguZtPiezmcmxZHGY9rou11b7mNEpfPl27M/NDgoQllNIv5sikOV6MAA27CN7VImS3JDxNxJjMPR6deQRu7lPscMQKXek/MJRmcn4AgjMsePEqvDd9b0xkzulS4kqpT/nIlDI+7AO/J1S+8tQ/tEH7omB1Ay2IAf6sNxmHxcnPWVtqoXErtXMpaN33r20ENKvLXtMjmCL+dq2SLOkXzdXMkcXEqZhHFsShLn8cJBgTIJkq/LS6nraznbomxdXsst/pPk1v7fQHdMBrxrNuCd0wHvngMANOrfDIKHn/cAAAAASUVORK5CYII=');">
                                        Globo Esporte</p>
                                    <h2 class="fw-bold fs-secondary-heading">
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
                    <a href="/calendario" class="main-heading-link | fs-primary-heading fw-bold">
                        Próxima Partida
                    </a>
                    <div class="next-match-card">
                        <div class="next-match-card-content | flow" style="--flow-space: 1em">
                            <p class="team-home" style="--icon-url: url('../images/flamengo-30.png');">Flamengo</p>
                            <p class="team-away" style="--icon-url: url('../images/flamengo-30.png');">Vasco</p>
                        </div>
                        <div class="next-match-card-footer">
                            <p class="next-match-round">Série A<br />Rodada 22</p>
                            <p class="next-match-date">sábado 19:00</p>
                        </div>
                    </div>
                </section>

                <section class="table-section">
                    <a href="/tabelas" class="main-heading-link | fs-primary-heading fw-bold">
                        Tabela Brasileirão
                    </a>
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
                            <td class="team-name" colspan="2" style="--icon-url: url('../images/flamengo-20.png');">
                                Red
                                Bull Bragantino <?= $pos ?></td>
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