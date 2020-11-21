<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name=description content="Pagina realizada para el curso de WEB1 de TUDAI">
    <base href="{$url}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/svg" href="image/icon/favicon.svg" />
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    <script type="module" src="js/app.js"></script>
    <title>{$titulo}</title>
</head>

<body>

    <div class="box header">
        <header>
            <button class="icon-menu" id="iconMenu">
                &#9776;
            </button>
            <h1>{$titulo}</h1>
        </header>
        <nav class="menu" id="menu">
            <button id="btn-home">HOME</button>
            <button id="btn-indoor">INDOOR</button>
            {if isset($session) }
            {if !$session->validSession()}
            <button id="btn-login">LOGIN</button>
            {else}
            <a href="logout" id="btn-logout">LOGOUT</a>
            {/if}
            {/if}

        </nav>

    </div>

    <div class="box">