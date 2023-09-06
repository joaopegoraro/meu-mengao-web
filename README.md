<p align="center">
  <img src="./public/images/logo-200.webp?raw=true" width="200" alt="Meu Mengão Logo" />
</p>

<h1 align="center"> Meu Mengão Web </h1>

<p align="center">
Website with the latest Flamengo news, fixtures, results and standings, 
with no ads. 
</br>
Made with pure PHP and CSS. 
</br>
Also contains the REST API used by  
<a href="https://github.com/joaopegoraro/meu-mengao">
Meu Mengão App
</a>
</p>

#### PT-BR

Site com as últimas notícias, resultados e tabelas do Flamengo, sem anúncios.
Feito em PHP e CSS puros. Também contém a API usada pelo [aplicativo do Meu Mengão](https://github.com/joaopegoraro/meu-mengao).

# Links

- Site: https://www.meumengao.com
- API: https://www.meumengao.com/api

## Screenshots

<p float="left">
  <img src="./screenshots/screenshot1.png?raw=true" width="32%" />
  <img src="./screenshots/screenshot2.png?raw=true" width="32%" />
  <img src="./screenshots/screenshot3.png?raw=true" width="32%" />
</p>
<p float="left">
  <img src="./screenshots/screenshot4.png?raw=true" width="32%" />
  <img src="./screenshots/screenshot5.png?raw=true" width="32%" />
  <img src="./screenshots/screenshot6.png?raw=true" width="32%" />
</p>

# API Endpoints (use them with https://www.meumengao.com/api)

## Get list of news articles

### Request

`GET /noticias`

### Response

```json
{
  [
    "id": 12345,
    "link": "https://somesite.com/some_article",
    "data": "1688689100456", // Milliseconds since epoch
    "titulo": "Title",
    "logo_site": "<Base 64 string of the logo of the article's site>",
    "foto": "<Base 64 string of the article's main image>"
  ]
}
```

## Get the details of the upcoming match

### Request

`GET /partidas/proxima`

### Response

```json
{
  "id": "djfKa#21",
  "campeonato": "Libertadores",
  "campeonato_id": "libertadores",
  "data": "1688689100456", // Milliseconds since epoch
  "rodada_name": "Oitavas de Final",
  "rodada_index" 1, // the position of the round in relation to other rounds, 0 is the oldest round
  "time_casa": "Flamengo",
  "gols_casa": "3",
  "time_fora": "Fluminense",
  "gols_fora": "0",
  "escudo_casa": "<Base 64 string of the home team logo>",
  "escudo_fora": "<Base 64 string of the away team logo>"
}
```

## Get list of the already played matches (results)

### Request

`GET /partidas/resultados`

### Response

```json
{
  [
    "id": "djfKa#21",
    "campeonato": "Libertadores",
    "campeonato_id": "libertadores",
    "data": "1688689100456", // Milliseconds since epoch
    "rodada_name": "Oitavas de Final",
    "rodada_index" 1, // the position of the round in relation to other rounds, 0 is the oldest round
    "time_casa": "Flamengo",
    "gols_casa": "3",
    "time_fora": "Fluminense",
    "gols_fora": "0",
    "escudo_casa": "<Base 64 string of the home team logo>",
    "escudo_fora": "<Base 64 string of the away team logo>"
  ]
}
```

## Get list of the upcoming matches (calendar)

### Request

`GET /partidas/calendario`

### Response

```json
{
  [
    "id": "djfKa#21",
    "campeonato": "Libertadores",
    "campeonato_id": "libertadores",
    "data": "1688689100456", // Milliseconds since epoch
    "rodada_name": "Oitavas de Final",
    "rodada_index" 1, // the position of the round in relation to other rounds, 0 is the oldest round
    "time_casa": "Flamengo",
    "gols_casa": "3",
    "time_fora": "Fluminense",
    "gols_fora": "0",
    "escudo_casa": "<Base 64 string of the home team logo>",
    "escudo_fora": "<Base 64 string of the away team logo>"
  ]
}
```

## Get list of the championships Flamengo is enrolled in

### Request

`GET /campeonatos`

### Response

```json
{
  [
    "id": "libertadores",
    "nome": "Libertadores",
    "ano": "2023",
    "logo": "<Base 64 string of the championship logo>",
    "rodada_atual": 1, // index of the most recent round
    "rodada_final": 8, // index of the last round
    "possui_classificacao": false, // wheter or not the championship has a standings table
  ]
}
```

## Get standings of selected championship

### Request

`GET /posicao/campeonato/{id}`

### Response

```json
{
  [
    "id": "someRandomId",
    "posicao": "1",
    "nome_time": "Flamengo",
    "escudo_time": "<Base 64 string of the team logo>",
    "pontos": "90",
    "jogos": "38",
    "vitorias": "28",
    "empates": "6",
    "derrotas": "4",
    "gols_feitos": "86",
    "gols_sofridos": "37",
    "saldo_gols": "49",
    "campeonato_id": "serie-a",
    "classificacao_name": "Grupo A",
    "classificacao_index": 0
  ]
}
```

## Get list of the championship matches

### Request

`GET /partidas/campeonato/{id}`

### Response

```json
{
  [
    "id": "djfKa#21",
    "campeonato": "Libertadores",
    "campeonato_d": "libertadores",
    "data": "1688689100456", // Milliseconds since epoch
    "rodada_name": "Oitavas de Final",
    "rodada_index" 1, // the position of the round in relation to other rounds, 0 is the oldest round
    "time_casa": "Flamengo",
    "gols_casa": "3",
    "time_fora": "Fluminense",
    "gols_fora": "0",
    "escudo_casa": "<Base 64 string of the home team logo>",
    "escudo_fora": "<Base 64 string of the away team logo>"
  ]
}
```
