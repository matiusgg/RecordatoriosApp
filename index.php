<?php
require_once 'vendor/autoload.php';
use models\{Conexion};

// require_once 'php/conexion';

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

    $anytime = new Conexion('localhost', 'root', '', 'recordatorios');
    $today = new Conexion('localhost', 'root', '', 'recordatorios');

    // $anytime->CrearTabla('anytime', $Atributosinbox);
    // $today->CrearTabla('today', $Atributosinbox);

    
    echo('<a href="php/contactar.php">');
    echo('CONTACTAR');
    echo('</a>');


}

// ENVIAR INFORMACION DEL INBOX A ANYTIME

if((!empty($_POST['anytime'])) && (!empty($_POST['inbox']))) {

$anytimeInbox = [

    'recordatorio' => $_POST['inbox']
];

// $anytime = new Conexion('localhost', 'root', '', 'recordatorios');

$anytime->InsertarTupla('anytime', $anytimeInbox);

header('Location: php/anytime.php');

}

// ENVIAR INFORMACION DEL INBOX A TODAY

if((!empty($_POST['today'])) && (!empty($_POST['inbox']))) {

    $todayInbox = [
    
       'recordatorio' => $_POST['inbox']
    ];
    // creamos el objeto. Actualizacion: La creacion de los objetos anytime y today, estan en sus propias paginas

    // $today = new Conexion('localhost', 'root', '', 'recordatorios');
    
    $today->InsertarTupla('today', $todayInbox);
    
    header('Location: php/today.php');
    
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
 <form action="index.php" method="post">
        <!-- <input type="text" name="dniLogin" placeholder="introduce tu DNI"
        pattern="[0-9]{8}[a-zA-Z]{1}">
        <button type="submit">Enviar</button> -->

        
  

    <!-- HEADER -->

    <header>
   <h1>
   GTD. GESTIONA TUS TAREAS
   </h1>
    </header>

<!-- SECTION -->
    <section>
    <article>
    <div>
    <h2>
    INBOX
    </h2>

    <textarea name="inbox" rows="10">
    </textarea>

<!-- <button type="submit">
AGREGAR RECORDATORIO
</button> -->

<!-- PARA ENVIAR INFORMACION A VARIAS PAGINAS CON HTML USAMOS INPUT: SUBMIT. EL CUAL NOS PERMITIRA ENVIAR INFORMACION -->

<!-- Input enviar anytime -->

<input type="submit" name="anytime" class="anytime" value="Anytime">

<!-- Input enviar today -->

<input type="submit" name="today" class="today" value="Today">


    </div>
    </article>

    </section>

    <!-- FOOTER -->

    <footer>
    
    
    </footer>

    </form>
</body>
</html>