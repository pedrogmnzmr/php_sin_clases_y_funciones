<?php 

const API_URL = "https://whenisthenextmcufilm.com/api";

#Inicializar una nueva sesion de cURL; ch = curl handle
$ch = curl_init(API_URL);

//Indicar que queremos recibir el resultado de la peticion y no mostralro en pantalla
curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);

/*Ejecutar la peticvion y 
guardmaos en un resultado*/
$result = curl_exec($ch);

//transformar el resultado en un array asociativo
$data = json_decode($result, true);

//cerramos la conexion
curl_close($ch);
   
//var_dump($data);


// si solo quieres hacer u GET de la api
// $result = file_get_content(API_URL)
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="La próxima pelicula de Marvel">
  <title>La proxima pelicula de Marvel</title>
  <!-- Se incluye Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    :root {
      color-scheme: light dark;
    }
    /* Opcional: fondo claro para el body */
    body {
      background-color:rgb(20, 20, 20);
      color: white;
      font: 1em sans-serif;
    }
  </style>
</head>

<main>

<div class="container my-5">
    <h1 class="text-center mb-4">La proxima pelicula de Marvel</h1>
    
    <div class="row justify-content-center mb-4">
      <div class="col-auto">
        <img 
          src="<?= $data["poster_url"] ?>" 
          alt="Poster de <?= $data["title"] ?>" 
          class="img-fluid rounded" 
          style="max-width: 300px;">
      </div>
    </div>
    
    <div class="text-center">
      <h2><?= $data["title"] ?> se estrena en <?= $data["days_until"] ?> dias</h2>
      <p>Fecha de estreno: <?= $data["release_date"] ?></p>
      <p>La siguiente peli es <?= $data["following_production"]["title"] ?></p>
    </div>
  </div>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</main>

</html> 
