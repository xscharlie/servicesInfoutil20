<?php
/*Servicio que devuelve un arreglo de objetos JSON con los filtros para cada categoría
recibe como parametros un entero que es el id de la subcategoría:
*/
	header('Content-Type: text/json');
	$SUBCAT_ID=$_REQUEST['SUBCAT_ID'];
	$servidor="infoutil20db.fernandomarroquin.com";
	$usuario="infoutil20db";
	$password="payaso21";
	$respuesta=array('resultado'=>2);
	json_encode($respuesta);
	$conexion=mysql_connect($servidor,$usuario,$password) or
	die ("Problemas en la conexion");
	$baseDatos="infoutil20";
	mysql_select_db($baseDatos,$conexion)
	or
	 die("Problemas en la seleccion de la base de datos");
/****Case para filtros******************************************************/

switch ($SUBCAT_ID) {
    case '2':
	$registros=mysql_query("SELECT id, name FROM medicine_categories;",$conexion) or
        die( json_encode($respuesta));
	$filas=array();
        while ($reg=mysql_fetch_assoc($registros))
        {
        //$filas[]=$reg;
        $filas[]=array_map('utf8_encode', $reg);
        }
        //echo json_encode($filas);
	$answ=array('flag'=>0,'Categoría de Medicamentos'=>$filas);
        echo json_encode($answ);

        break;
    case '3':
        $registros1=mysql_query("SELECT id, name FROM health_establishment_types;",$conexion) or
        die( json_encode($respuesta));
        $filas1=array();
        while ($reg1=mysql_fetch_assoc($registros1))
        {
        //$filas[]=$reg;
        $filas1[]=array_map('utf8_encode', $reg1);
        }

	$registros2=mysql_query("SELECT id, name FROM states;",$conexion) or
        die( json_encode($respuesta));
	$filas2=array();
        while ($reg2=mysql_fetch_assoc($registros2))
        {
        //$filas[]=$reg;
        $filas2[]=array_map('utf8_encode', $reg2);
        }

	$registros3=mysql_query("SELECT id, state_id, name FROM cities;",$conexion) or
        die( json_encode($respuesta));
	$filas3=array();
        while ($reg3=mysql_fetch_assoc($registros3))
        {
        //$filas[]=$reg;
        $filas3[]=array_map('utf8_encode', $reg3);
        }

        //echo json_encode($filas);
        $answ=array('flag'=>0,'Tipo de establecimiento de salud'=>$filas1,
			'Departamento'=>$filas2,
			'Municipio'=>$filas3);
        echo json_encode($answ);

        break;
    case '0':
        echo "i es igual a 2";
        break;
    case '4':
        $registros=mysql_query("SELECT id, name FROM doctor_especialities;",$conexion) or
        die( json_encode($respuesta));
        $filas=array();
        while ($reg=mysql_fetch_assoc($registros))
        {
        //$filas[]=$reg;
        $filas[]=array_map('utf8_encode', $reg);
        }
        //echo json_encode($filas);
        $answ=array('flag'=>0,'Carrera'=>$filas);
        echo json_encode($answ);
        break;
    case '15':
        $registros1=mysql_query("SELECT id, name FROM food_establishment_types;",$conexion) or
        die( json_encode($respuesta));
        $filas1=array();
        while ($reg1=mysql_fetch_assoc($registros1))
        {
        //$filas[]=$reg;
        $filas1[]=array_map('utf8_encode', $reg1);
        }

        $registros2=mysql_query("SELECT id, name FROM states;",$conexion) or
        die( json_encode($respuesta));
        $filas2=array();
        while ($reg2=mysql_fetch_assoc($registros2))
        {
        //$filas[]=$reg;
        $filas2[]=array_map('utf8_encode', $reg2);
        }

        $registros3=mysql_query("SELECT id, state_id, name FROM cities;",$conexion) or
        die( json_encode($respuesta));
        $filas3=array();
        while ($reg3=mysql_fetch_assoc($registros3))
        {
        //$filas[]=$reg;
        $filas3[]=array_map('utf8_encode', $reg3);
        }
        $answ=array('flag'=>0,'Tipo de establecimiento de salud'=>$filas1,
                        'Departamento'=>$filas2,
                        'Municipio'=>$filas3);

        echo json_encode($answ);

        break;
 case '0':
        echo "i es igual a 2";
        break;
 case '6':
	$registros2=mysql_query("SELECT id, name FROM states;",$conexion) or
        die( json_encode($respuesta));
        $filas2=array();
        while ($reg2=mysql_fetch_assoc($registros2))
        {
        //$filas[]=$reg;
        $filas2[]=array_map('utf8_encode', $reg2);
        }

	$registros3=mysql_query("SELECT id, state_id, name FROM cities;",$conexion) or
        die( json_encode($respuesta));
        $filas3=array();
        while ($reg3=mysql_fetch_assoc($registros3))
        {
        //$filas[]=$reg;
        $filas3[]=array_map('utf8_encode', $reg3);
        }
        $answ=array('flag'=>1,
                    'Departamento'=>$filas2,
                    'Municipio'=>$filas3);

        echo json_encode($answ);

        break;
    case '7':
	$registros2=mysql_query("SELECT id, name FROM states;",$conexion) or
        die( json_encode($respuesta));
        $filas2=array();
        while ($reg2=mysql_fetch_assoc($registros2))
        {
        //$filas[]=$reg;
        $filas2[]=array_map('utf8_encode', $reg2);
        }

        $registros3=mysql_query("SELECT id, state_id, name FROM cities;",$conexion) or
        die( json_encode($respuesta));
        $filas3=array();
        while ($reg3=mysql_fetch_assoc($registros3))
        {
        //$filas[]=$reg;
        $filas3[]=array_map('utf8_encode', $reg3);
        }
        $answ=array('flag'=>1,
		    'Departamento'=>$filas2,
                    'Municipio'=>$filas3);
        echo json_encode($answ);
        break;


}
/**************************************************************************/
	/*$filas=array();
	while ($reg=mysql_fetch_assoc($registros))
	{
	//$filas[]=$reg;
	$filas[]=array_map('utf8_encode', $reg);
	}
	//echo json_encode($filas);
	echo json_encode($filas);*/

	mysql_close($conexion);
?>
