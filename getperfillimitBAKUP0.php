<?php
/*Servicio que devuelve la lista de subcategorias
recibe como parametros: el nombre de la tabla de la sub categoría.

*/	

    include 'conexion.php';

    header('Content-Type: text/json');
	
    $idsubcat=$_REQUEST['idsubcat'];
	$idcat=$_REQUEST['idcat'];
	$idelemento=$_REQUEST['idelemento'];
	$tipo=$_REQUEST['tipo'];
	$limit=$_REQUEST['limit'];
	
	$respuesta=array('resultado'=>2);
	json_encode($respuesta);
	$conexion=mysql_connect($servidor,$usuario,$password) or
	die ("Problemas en la conexion");

	mysql_select_db($baseDatos,$conexion)
	or die("Problemas en la seleccion de la base de datos");

$tabla = array(
    2  => "medicines",
    3  => "health_establishments",
    4  => "doctors",
    15 => "food_establishments",
    6  => "schools",
    7  => "universities",
    9  => "product_categories",
    12  => "finances",
    14  => "product_categories",
    19  => "companies",
    21  => "product_categories",
    26  => "solvent_companies",
    27  => "electricity_companies",//por el momento solo envia el nombre de las compañias
//    35  => "accountants",
    36  => "accountants",
    39  => "fodes_cities_transfers",
    11  => "civil_organizations",
    13  => "delegations",
    16  => "syndicates",
    17  => "cooperatives",
    18  => "delation_institutions",
    20  => "refuges",
    25  => "risk_prevention_consultants",
    28  => "telephone_companies_concessions",
    29  => "radial_frequencies",
    30  => "radial_concessions",
    32  => "roads",
    33  => "disabled_associations",
    34  => "fovial_companies",
    37  => "woman_cities",
    41  => "municipality_infos",
    23  => "sports_grants",
    24  => "sports_federation_transfers",
    31  => "cultural_fees",//ESTA TABLA NO EXISTE//se cambia cultural_events por cultural_fees para mostrarlos todos
    38  => "cultural_fees",
    42  => "natives",
    43  => "libraries",
    44  => "festivities",//ESTA TABLA TAMPOCO ESTA EN LA BASE PROPORCIONADA
    45  => "choirs",
    46  => "cultures"
);
	switch ($idsubcat) {
    case '2':
       //        mysql_query("UPDATE ELEMENTO SET VISITAS=VISITAS+1 WHERE IDSUBCATEGORIA=$idsubcat AND IDELEMENTO=$idelemento", $conexion) or die(json_encode($respuesta));
        mysql_query("INSERT INTO ELEMENTO SET VISITAS=1, IDELEMENTO=$idelemento, IDSUBCATEGORIA=$idsubcat, IDCATEGORIA=$idcat, CANTCOMENTARIOS=0, PROMEVALUACION=0, DENUNCIAS=0 ON DUPLICATE KEY UPDATE VISITAS=VISITAS+1", $conexion) or die(json_encode($respuesta));

        $registros=mysql_query("SELECT $tabla[$idsubcat].id, $tabla[$idsubcat].name, $tabla[$idsubcat].quantity, $tabla[$idsubcat].unit, $tabla[$idsubcat].price, ELEMENTO.PROMEVALUACION, COMENTARIO.NOMBREUSUARIO, COMENTARIO.COMENTARIO, COMENTARIO.EVALUACION, COMENTARIO.FECHA FROM $tabla[$idsubcat], ELEMENTO, COMENTARIO WHERE ELEMENTO.IDELEMENTO=$idelemento AND COMENTARIO.IDCATEGORIA=$idcat AND COMENTARIO.IDSUBCATEGORIA=$idsubcat AND COMENTARIO.IDELEMENTO=$idelemento AND $tabla[$idsubcat].id=$idelemento AND COMENTARIO.TIPO=$tipo ORDER BY COMENTARIO.FECHA DESC LIMIT $limit, 10", $conexion) or
        die(json_encode($respuesta));


        $filas=array();
            while ($reg=mysql_fetch_assoc($registros))
             {
                $filas[]=array_map('utf8_encode', $reg);
             }
        $descripcion=array('id'=>'id','name'=>'nombre','cantidad'=>'concentración','precio'=>'Precio máximo de venta','flag'=>'yatermino');      

        $answ=array('Elemento'=>$filas,'Descripcion'=>$descripcion);
            echo json_encode($answ);
    

    break;
    case '3':
       $registros=mysql_query("SELECT $tabla[$idsubcat].id, $tabla[$idsubcat].name, $tabla[$idsubcat].phone, $tabla[$idsubcat].address, ELEMENTO.PROMEVALUACION, COMENTARIO.NOMBREUSUARIO, COMENTARIO.COMENTARIO, COMENTARIO.EVALUACION, COMENTARIO.FECHA FROM $tabla[$idsubcat], ELEMENTO, COMENTARIO WHERE ELEMENTO.IDELEMENTO=$idelemento AND COMENTARIO.IDCATEGORIA=$idcat AND COMENTARIO.IDSUBCATEGORIA=$idsubcat AND $tabla[$idsubcat].id=$idelemento ORDER BY COMENTARIO.FECHA DESC LIMIT $limit, 10", $conexion) or
        die(json_encode($respuesta));
        $filas=array();
            while ($reg=mysql_fetch_assoc($registros))
             {
                $filas[]=array_map('utf8_encode', $reg);
             }
        $descripcion=array('id'=>'id','name'=>'nombre','telefono'=>'teléfono','direccion'=>'dirección','flag'=>'yatermino');      

        $answ=array('Elemento'=>$filas,'Descripcion'=>$descripcion);
            echo json_encode($answ);
    

    break;
    default:
         $registros=mysql_query("SELECT id, name FROM $tabla[$idsubcat] limit $limit, 10", $conexion) or
         die(json_encode($respuesta));
          $filas=array();
            while ($reg=mysql_fetch_assoc($registros))
            {
                $filas[]=array_map('utf8_encode', $reg);
            }
         echo json_encode($filas);
       
    }

	mysql_close($conexion);
?>

