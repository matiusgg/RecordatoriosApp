<?php
require_once '../vendor/autoload.php';
use models\{Conexion};

$anytime = new Conexion('localhost', 'root', '', 'recordatorios');

// $Atributosinbox =  
//     "active TINYINT(1) NOT NULL DEFAULT 1,
//     created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
//     updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP);";

    
// $anytime->CrearTabla('anytime', $Atributosinbox);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Anytime</title>
</head>
<body>
<h1>
TODAY
</h1>
    <section>
    <div class="listarecordatorios">
    <?php
// MOSTRAR RECORDATORIOS

$anytime-> verTuplas('anytime');

?>
    </div>
    </section>
</body>
</html>