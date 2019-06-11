<?php
namespace models;

class Conexion{

    // PROPIEDADES
    
    
    private $conexion;
    private $Atributos;


    // CONSTRUCTOR

    public function __construct($servidor, $usuario, $password, $basededatos){

        // COMO VEMOS AL FINAL EL CONSTRUCTOR ES UNA FUNCION Y AL LLAMAR LA PROPIEDAD CONEXION:
        // Y LA IGUALAMOS CON LA CREACION DEL MYSQLI. 
        // RECORDEMOS AL FINAL ES UNA FUNCION, Y AL LLAMAR LA PROPIEDADES E IGUALARLA CON EL PARAMETRO DEL CONSTRUCTOR
        // ESTAMOS OBLIGANDO A ESA PROPIEDAD HA ESTAR AHI Y NO SALIR PORQUE LA IGUALAMOS AL PARAMETRO POR LO CUAL AL CREAR EL OBJETO, 
        // ES OBLIGATORIO COLOCAR Y DEFINIR LOS PARAMETROS DEL CONSTRUCTOR AL MOMENTO DE CREAR EL OBJETO.
        // POR LO CUAL CUANDO IGUALAMOS UNA PROPIEDAD AL PARAMETRO DEL CONSTRUCTOR NO ES SIEMPRE NECESARIO IGUALARLO AL PARAMETRO
        // AUNQUE SERIA LO IDEAL Y OBVIO, AL FINAL PODEMOS IGUALAR LA PROPIEDAD CON LO QUE QUERAMOS
        // AQUI BASICAMENTE LO QUE HICIMOS FUE IGUALAR LA PROPIEDAD 'CONEXION' CON EL METODO DE MYSQLI
        // para cuando creamos el objeto, ya dentro del constructor esta el mysqli.



$this->conexion = new \mysqli($servidor, $usuario, $password, $basededatos);

// si queremos usar un parametro fuera sin tener que crear un servidor


    }

    // METODOS

// METODO PARA INSERTAR TUPLA

    public function InsertarTupla($nombretabla, $AtributosyDatos){

        //  queremos mediante los parametros, insertar la tabla, el atributo y datos.
    //  $this->Atributos = $AtributosyDatos;

     // IMPLODE: UNE ELEMENTOS DE UN ARRAY EN UN STRING. ESTRUCTURA: implode("caracter que nos va a separar los contenidos del array", $array);
     // ARRAY_KEYS: NOS DEVUELVE TODAS LAs LLAVES DEL ARRAY. ESTRUCTURA: array_keys($arrayconllave=>valor)

     // Explicacion: el implode(", ") aqui le estamos indicando que nos una el contenido del array por ", ".
     // y en el segunda parte del implode ponemos el array que queremos unir su contenido

     // EJM: $array = implode(", ", array_keys($AtributosDatos))

     //SEPARAMOS DATOS

				// implode — Une elementos de un array en un string
				// array_keys — Devuelve todas las claves de un array o un subconjunto de claves de un array
				 
				 
				// convertimos las llaves en un string 
                $atributos = implode(", " , array_keys($AtributosyDatos));
				 
				 
				// creamos un nuevo array, para despues convertirlo en string con implode 
				  $i = 0;
				  foreach($AtributosyDatos as $key=>$valor) {

                    // creacion del array en donde $dato[posiciones] va ir acumulando por cada vuelta del bucle, va a ir a acumulando
                    // los valores de las llaves, como vemos tiene antes y despues de $valor strings con " ' " para poner el contenido en modo string en mysql.
                    // el contador cada vez que va aumentando va sumando 1
				 
				   $dato[$i] = "'" . $valor . "'";
                      $i++;
                      
				  }
				  
				 // convertir el array anterio en un string
				  $datos = implode(", ", $dato);


				 
				//Insertamos los valores en cada campo
				$this->conexion->query(" insert into $nombretabla ($atributos) VALUES ($datos);");
      


        // comprobacion de los $_POST
        
        
        // RECORDEMOS QUE LA "" EN MYSQL SON STRINGS POR ESO NO TE CONFUNDAS PORQUE AQUI LAS "" EN EL QUERY SON DEL MYSQL MAS NO DEL PHP.
        // $insertarRecordatorio = $this->conexion->query(' 
        // INSERT INTO ' . $nombretabla . ' (' . $AtributosDatos .= $AtributosDatos . ', ' . ') VALUE (' . $valor . ') ');

     

    }



    public function verResultados($nombretabla) {


        

        // foreach($AtributosyDatos AS $key => $valor) {



        // }

     
        $leer = $this->conexion->query("select * from $nombretabla");

// CREAMO SUN FOREACH PARA QUE $resultados, para uqe nos muestre los datos de la base de datos, en este caso dentro de [nosmbre de atributo].

echo('<pre>');
print_r($leer);
echo('</pre>');


foreach($leer AS $valor) {

if($nombretabla == 'gtd') {

    echo $valor['id'] . ' - ';
    echo $valor['recordatorio'] . ' - ';
    echo $valor['estado'] . ' - ';
    echo $valor['fechaRecordatorio'] . '<br>';


}

if($nombretabla == 'contactar') {

    echo $valor['id_contactar'] . ' - ';
    echo $valor['nombre'] . ' - ';
    echo $valor['mail'] . ' - ';
    echo $valor['comentario'] . ' - ';
    echo $valor['active'] . ' - ';
    echo $valor['created_at'] . ' - ';
    echo $valor['updated_at'] . '<br>';


}



}


    }

    // PARAMETROS: nombretabla y PRopiedades de los atributos y su creacion

    public function CrearTabla($nombretabla, $Atributos) {

   // Hazte una idea de que crear tablas es muy poco comun, por lo cual es mejor poner directamente los atributos aqui mismo y no en un parametro.

   

        $codigotabla = $this->conexion->query("create table if not exists $nombretabla (id_$nombretabla INTEGER UNSIGNED PRIMARY KEY AUTO_INCREMENT, $Atributos");

    }

    public function BorrarTabla($nombretabla) {

        $codigotabla = $this->conexion->query("drop table $nombretabla;");
    }




}

?>