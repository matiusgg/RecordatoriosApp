<?php
require_once '../vendor/autoload.php';
use models\{Conexion};

$today = new Conexion('localhost', 'root', '', 'recordatorios');

// $Atributosinbox =  
//     "active TINYINT(1) NOT NULL DEFAULT 1,
//     created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
//     updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP);";


// $today->CrearTabla('today', $Atributosinbox);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Today</title>
</head>
<body>
<h1>
TODAY
</h1>
    <section>
    <div class="listarecordatorios">

    <?php
// MOSTRAR RECORDATORIOS

$today-> verTuplas('today');


?>
    
    </div>
    </section>
</body>
</html>