<?php

    const API_URL = "https://whenisthenextmcufilm.com/api";
    //Inicializar una nueva sesion de cURL; ch = cURL handle
    $ch = curl_init(API_URL);
    //indicar que queremos recibir el resultado de la peticion y no mostrarla en pantallla
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $result = curl_exec($ch);

    //una alternativa seria utilizar file_get_contents(API_URL)
    //
    $data = json_decode($result, true);

    curl_close($ch);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La proxima pelicula de marvel</title>
</head>
<body>
    <pre style="font-size: 12px; overflow: scroll; height: 250px;">
        <?php var_dump($data); ?>
    </pre>
    <section>
        <h2>La proxima pelicula de marvel</h2>
        <img src="<?= $data["poster_url"]; ?>" width="200" alt="Poster de <?= $data["title"]; ?>" style="border-radius: 16px;" >
    </section>

    <hgroup>
        <h3><?= $data["title"]; ?> se estrena en <?= $data["days_until"]; ?> dias</h3>
        <p>Fecha de estreno <?= $data["release_date"]; ?></p>
        <p>La siguiente es <?= $data["following_production"]["title"]; ?></p>
    </hgroup>
</body>
</html>



<style>
    :root{
        color-scheme: dark;
    }
    body{
        display: grid;
        place-content: center;
    }
    section{
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: center;
    }
    hgroup{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    img{
        margin: 0 auto;
    }
</style>