<?php
require_once 'vendor/autoload.php';
use models\{Conexion};

// require_once 'php/conexion';
$anytime = new Conexion('localhost', 'root', '', 'recordatorios');
$today = new Conexion('localhost', 'root', '', 'recordatorios');

if(isset($_POST['inbox'])) {

    $Atributosinbox =  
    "active TINYINT(1) NOT NULL DEFAULT 1,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP);";

    $inboxBD = $_POST['inbox'];

    // array del inbox para que no nos de problemas con el metodo InsertarTupla(), en donde usamos arrays, porque queremos usar muchos atributos si se da el caso.

    $inbox = [

        'gtd' => $inboxBD
    ];
// CREAMOS LA BASE DE DATOS MEDIANTE ESTE OBJETO Y PORQUE EN EL CONSTRUCTOR IGUALAMOS LA PROPIEDAD CON EL MYSQLI
    $gtd = new Conexion('localhost', 'root', '', 'recordatorios');
    // ANTES: $gtd->InsertarTupla('gtd', 'recordatorio', "\" $inboxBD \"");
    $gtd->InsertarTupla('gtd', $inbox);
    $gtd->verTuplas('gtd');
    // $gtd->CrearTabla('historialbase', $Atributosinbox);


    // $anytime->CrearTabla('anytime', $Atributosinbox);
    // $today->CrearTabla('today', $Atributosinbox);

    
    echo('<a href="php/contactar.php">');
    echo('CONTACTAR');
    echo('</a>');


}

// ENVIAR INFORMACION DEL INBOX A ANYTIME

for($i = 0; $i < 10; $i++) {

if( !empty($_POST['anytime']) && !empty($_POST['inbox' . $i]) ) {

$anytimeInbox = [

    'recordatorio' => $_POST['inbox' . $i]
];

// $anytime = new Conexion('localhost', 'root', '', 'recordatorios');

$anytime->InsertarTupla('anytime', $anytimeInbox);

header('Location: php/anytime.php');

}

// ENVIAR INFORMACION DEL INBOX A TODAY

if((!empty($_POST['today'])) && (!empty($_POST['inbox' . $i]))) {

    $todayInbox = [
    
       'recordatorio' => $_POST['inbox' . $i]
    ];
    // creamos el objeto. Actualizacion: La creacion de los objetos anytime y today, estan en sus propias paginas

    // $today = new Conexion('localhost', 'root', '', 'recordatorios');
    
    $today->InsertarTupla('today', $todayInbox);
    
    header('Location: php/today.php');
    
    }

}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/styles.css">
    
</head>
<body>

<!-- DIV que nos ayudara a contener el contenidp -->

<div class="contenedor">

    <!-- HEADER -->

<header>
    <h1 class="titulo">
        <!-- METODO_BEN: METODOLOGIA PARA IDENTIFICAR UNA ETIQUETA: PADRE-HIJO: titulo__icono Donde titulo es h2(padre) y la img(hijo)... -->
    <img class="titulo__icono" src="_assets/img/svg/btn_Inbox_index.svg" alt="">GTD</h1>


</header>
 <form action="index.php" method="post" class="formulario__inbox">
        <!-- <input type="text" name="dniLogin" placeholder="introduce tu DNI"
        pattern="[0-9]{8}[a-zA-Z]{1}">
        <button type="submit">Enviar</button> -->

<!-- SECTION -->
    <section class="formulario">
    <article>
    <div>
    <h2>
    INBOX
    </h2>

    <?php

    for($i = 0; $i < 10; $i++) {

echo '<input type="text" name="inbox' . $i .'">';

    }


    ?>

<!-- <button type="submit">
AGREGAR RECORDATORIO
</button> -->

<!-- PARA ENVIAR INFORMACION A VARIAS PAGINAS CON HTML USAMOS INPUT: SUBMIT. EL CUAL NOS PERMITIRA ENVIAR INFORMACION -->

<!-- Input enviar anytime -->

<input type="submit" name="anytime" class="formulario__inbox_botonAnytime" value="+">

<!-- Input enviar today -->

<input type="submit" name="today" class="formulario__inbox_botonToday" value="+">


    </div>
    </article>

    </section>

    <!-- FOOTER -->

    <footer>
    
    
    </footer>

    </form>


    </div>
</body>
</html>