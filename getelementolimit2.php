
<?php
/*Servicio que devuelve la lista de subcategorias
recibe como parametros: el nombre de la tabla de la sub categoría.

*/	

    include 'conexion.php';

    //header('Content-Type: text/json');

	$idsubcat=$_REQUEST['idsubcat'];
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
    9  => "product_categories",//Alimentos
    12  => "finances",
    14  => "product_categories",//Utiles escolares
    19  => "companies",
    21  => "product_categories",//Fertilizantes
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


        $registros=mysql_query("SELECT id, name, quantity, unit, price  FROM $tabla[$idsubcat] limit $limit,10 ", $conexion) or
        die(json_encode($respuesta));
         $filas=array();
            while ($reg=mysql_fetch_assoc($registros))
             {
                $filas[]=array_map('utf8_encode', $reg);
             }

        $filas2 = array();
            $filas3= array();
            foreach ($filas as $key => $value) {
                    # code...
                $cadena=$value['name'].', '.$value['quantity'].', '.$value['unit'].', '.$value['price'];
                $filas2['id']=$value['id'];
                $filas2['name']=$cadena;
                $filas3[]=$filas2;
                /*array_push($filas2,$value['id'] );
                array_push($filas2, $cadena);*/
            }
        //$descripcion=array('id'=>'id','name'=>'nombre','cantidad'=>'cantidad','unidad'=>'unidad','precio'=>'Precio máximo de venta');      

        //$answ=array('Elemento'=>$filas,'Comentarios'=>$filas2,'Descripcion'=>$descripcion);
            echo json_encode($filas3);
    

        break;
         case '3':
       //        mysql_query("UPDATE ELEMENTO SET VISITAS=VISITAS+1 WHERE IDSUBCATEGORIA=$idsubcat AND IDELEMENTO=$idelemento", $conexion) or die(json_encode($respuesta));


         $registros=mysql_query("SELECT id, name, phone, address FROM $tabla[$idsubcat] limit $limit,10", $conexion) or
        die(json_encode($respuesta));
        
        $filas=array();
            while ($reg=mysql_fetch_assoc($registros))
             {
                $filas[]=array_map('utf8_encode', $reg);
             }

        $filas2 = array();
            $filas3= array();
            foreach ($filas as $key => $value) {
                if ($value['phone']==NULL) {
                    $cadena=$value['name'].', '.'N/A'.', '.$value['address'];
                }else{
                $cadena=$value['name'].', '.$value['phone'].', '.$value['address'];
                }
                $filas2['id']=$value['id'];
                $filas2['name']=$cadena;
                $filas3[]=$filas2;
                /*array_push($filas2,$value['id'] );
                array_push($filas2, $cadena);*/
            }
        //$descripcion=array('id'=>'id','name'=>'nombre','cantidad'=>'cantidad','unidad'=>'unidad','precio'=>'Precio máximo de venta');      

        //$answ=array('Elemento'=>$filas,'Comentarios'=>$filas2,'Descripcion'=>$descripcion);
            echo json_encode($filas3);
    

        break;
         case '4':
       //        mysql_query("UPDATE ELEMENTO SET VISITAS=VISITAS+1 WHERE IDSUBCATEGORIA=$idsubcat AND IDELEMENTO=$idelemento", $conexion) or die(json_encode($respuesta));


        $registros=mysql_query("SELECT $tabla[$idsubcat].id, $tabla[$idsubcat].name, $tabla[$idsubcat].register_number, doctor_especialities.name as carrera FROM $tabla[$idsubcat], doctor_especialities WHERE $tabla[$idsubcat].doctor_especiality_id=doctor_especialities.id limit $limit,10 ", $conexion) or
        die(json_encode($respuesta));
        
        $filas=array();
            while ($reg=mysql_fetch_assoc($registros))
             {
                $filas[]=array_map('utf8_encode', $reg);
             }


        $filas2 = array();
            $filas3= array();
            foreach ($filas as $key => $value) {
                    # code...
                $cadena=$value['name'].', '.$value['register_number'].', '.$value['carrera'];
                $filas2['id']=$value['id'];
                $filas2['name']=$cadena;
                $filas3[]=$filas2;
                /*array_push($filas2,$value['id'] );
                array_push($filas2, $cadena);*/
            }
        //$descripcion=array('id'=>'id','name'=>'nombre','cantidad'=>'cantidad','unidad'=>'unidad','precio'=>'Precio máximo de venta');      

        //$answ=array('Elemento'=>$filas,'Comentarios'=>$filas2,'Descripcion'=>$descripcion);
            echo json_encode($filas3);
    

        break;
         case '15':
        $registros=mysql_query("SELECT id, name, address, authorized_at, authorization_expire_at FROM $tabla[$idsubcat] limit $limit,10", $conexion) or
        die(json_encode($respuesta));
        
        $filas=array();
            while ($reg=mysql_fetch_assoc($registros))
             {
                $filas[]=array_map('utf8_encode', $reg);
             }


        $filas2 = array();
            $filas3= array();
            foreach ($filas as $key => $value) {
                    # code...
                $cadena=$value['name'].', '.$value['address'].', '.$value['authorized_at'].', '.$value['authorization_expire_at'];
                $filas2['id']=$value['id'];
                $filas2['name']=$cadena;
                $filas3[]=$filas2;
                /*array_push($filas2,$value['id'] );
                array_push($filas2, $cadena);*/
            }
        //$descripcion=array('id'=>'id','name'=>'nombre','cantidad'=>'cantidad','unidad'=>'unidad','precio'=>'Precio máximo de venta');      

        //$answ=array('Elemento'=>$filas,'Comentarios'=>$filas2,'Descripcion'=>$descripcion);
            echo json_encode($filas3);
    

        break;
         case '12':
           $registros=mysql_query("SELECT id, name, phone, address, auth FROM $tabla[$idsubcat] limit $limit,10 ", $conexion) or
             die(json_encode($respuesta));

             $filas=array();
                while ($reg=mysql_fetch_assoc($registros))
                {
                    $filas[]=array_map('utf8_encode', $reg);
                }

            $filas2 = array();
            $filas3= array();
            foreach ($filas as $key => $value) {
                if ($value['auth']==1) {
               $cadena=$value['name'].', '.$value['phone'].', '.$value['address'].','.'Autorizado';
                }else{
               $cadena=$value['name'].', '.$value['phone'].', '.$value['address'].','.'N/A';
                }
                    # code...
             
                $filas2['id']=$value['id'];
                $filas2['name']=$cadena;
                $filas3[]=$filas2;
                /*array_push($filas2,$value['id'] );
                array_push($filas2, $cadena);*/
            }
        //$descripcion=array('id'=>'id','name'=>'nombre','cantidad'=>'cantidad','unidad'=>'unidad','precio'=>'Precio máximo de venta');      

        //$answ=array('Elemento'=>$filas,'Comentarios'=>$filas2,'Descripcion'=>$descripcion);
            echo json_encode($filas3);
    

        break;

   /* case '14':
        $registros=mysql_query("SELECT id, name FROM $tabla[$idsubcat] WHERE category_id=14 limit $limit, 10", $conexion) or
        die(json_encode($respuesta));

        $filas=array();
            while ($reg=mysql_fetch_assoc($registros))
            {
                $filas[]=array_map('utf8_encode', $reg);
            }
        echo json_encode($filas);
    

    break;*/
   /* case '9':
        $registros=mysql_query("SELECT id, name FROM $tabla[$idsubcat] where category_id=9 limit $limit, 10", $conexion) or
        die(json_encode($respuesta));
        $filas=array();
            while ($reg=mysql_fetch_assoc($registros))
            {
                $filas[]=array_map('utf8_encode', $reg);
            }
        echo json_encode($filas);
    

    break;*/
    /*case '21':
         $registros=mysql_query("SELECT id, name FROM $tabla[$idsubcat] where category_id=21 limit $limit, 10", $conexion) or
         die(json_encode($respuesta));
         $filas=array();
            while ($reg=mysql_fetch_assoc($registros))
            {
                $filas[]=array_map('utf8_encode', $reg);
            }
         echo json_encode($filas);
    

    break;  */
   /* case '7':
         $registros=mysql_query("SELECT id, name, address FROM $tabla[$idsubcat] limit $limit, 10", $conexion) or
         die(json_encode($respuesta));
         $filas=array();
            while ($reg=mysql_fetch_assoc($registros))
            {
                $filas[]=array_map('utf8_encode', $reg);
            }
         echo json_encode($filas);
    

    break;*/
     case '31':
         $registros=mysql_query("SELECT id, description FROM $tabla[$idsubcat] limit $limit, 10", $conexion) or
         die(json_encode($respuesta));
         $filas=array();
            while ($reg=mysql_fetch_assoc($registros))
            {
                $filas[]=array_map('utf8_encode', $reg);
            }
         echo json_encode($filas);
    

    break;
     case '38':
         $registros=mysql_query("SELECT id, description FROM $tabla[$idsubcat] limit $limit, 10", $conexion) or
         die(json_encode($respuesta));
         $filas=array();
            while ($reg=mysql_fetch_assoc($registros))
            {
                $filas[]=array_map('utf8_encode', $reg);
            }
         echo json_encode($filas);
    

    break;
     /*case '9':
         $registros=mysql_query("SELECT id, description FROM $tabla[$idsubcat] limit $limit, 10", $conexion) or
         die(json_encode($respuesta));
         $filas=array();
            while ($reg=mysql_fetch_assoc($registros))
            {
                $filas[]=array_map('utf8_encode', $reg);
            }
         echo json_encode($filas);
    

    break;*/
      case '6':
         $registros=mysql_query("SELECT schools.id, schools.name, school_infos.year, academic_grades.name as gradoAcademico, school_infos.turn, school_infos.quota 
                                from schools 
                                inner join school_infos on schools.id = school_infos.school_id 
                                inner join academic_grades on school_infos.academic_grade_id=academic_grades.id  
                                limit $limit, 10", $conexion) or
         die(json_encode($respuesta));
         $filas=array();
            while ($reg=mysql_fetch_assoc($registros))
            {
                
                $filas[]=array_map('utf8_encode', $reg);

            }
            
            $filas2 = array();
            $filas3= array();
            foreach ($filas as $key => $value) {
                    # code...
                $cadena=$value['name'].', '.$value['gradoAcademico'].', '.$value['year'].', '.$value['turn'].', '.$value['quota'];
                $filas2['id']=$value['id'];
                $filas2['name']=$cadena;
                $filas3[]=$filas2;
                /*array_push($filas2,$value['id'] );
                array_push($filas2, $cadena);*/
            }

         echo json_encode($filas3);
    break;
    case '7':
         $registros=mysql_query("SELECT  universities.id,  universities.name , carreers.name as carrera, universities.address 
                                from  universities 
                                inner join carreers on  universities.id = carreers.university_id  
                                limit $limit, 10", $conexion) or
         die(json_encode($respuesta));
         $filas=array();
            while ($reg=mysql_fetch_assoc($registros))
            {
                
                $filas[]=array_map('utf8_encode', $reg);

            }
            
            $filas2 = array();
            $filas3= array();
            foreach ($filas as $key => $value) {
                    # code...
                $cadena=$value['name'].', '.$value['carrera'].', '.$value['address'];
                $filas2['id']=$value['id'];
                $filas2['name']=$cadena;
                $filas3[]=$filas2;
                /*array_push($filas2,$value['id'] );
                array_push($filas2, $cadena);*/
            }

         echo json_encode($filas3);
    break;
     case '9':
         $registros=mysql_query("SELECT products.id, products.name,
                                product_brands.name as marca,
                                shopping_establishments.name as establecimiento, 
                                product_presentations.name as presentacion, 
                                product_probes.price
                                from products 
                                inner join  product_probes on products.id=product_probes.product_id 
                                inner join  shopping_establishments on product_probes.shopping_establishment_id= shopping_establishments.id
                                inner join product_presentations on product_probes.product_presentation_id=product_presentations.id 
                                inner join product_categories on products.product_category_id=product_categories.id 
                                inner join product_brands on product_probes.product_brand_id=product_brands.id
                                where product_categories.category_id=$idsubcat
                                limit $limit, 10", $conexion) or die(json_encode($respuesta));
             $filas=array();
            while ($reg=mysql_fetch_assoc($registros))
            {
                
                $filas[]=array_map('utf8_encode', $reg);

            }
            
            $filas2 = array();
            $filas3= array();
            foreach ($filas as $key => $value) {
                    # code...
                $cadena=$value['name'].', '.$value['marca'].', '.$value['establecimiento'].', '.$value['presentacion'].', '.$value['price'];
                $filas2['id']=$value['id'];
                $filas2['name']=$cadena;
                $filas3[]=$filas2;
                /*array_push($filas2,$value['id'] );
                array_push($filas2, $cadena);*/
            }

         echo json_encode($filas3);
    break;
     case '14':
         $registros=mysql_query("SELECT products.id, products.name,
                                product_brands.name as marca,
                                shopping_establishments.name as establecimiento, 
                                product_presentations.name as presentacion, 
                                product_probes.price
                                from products 
                                inner join  product_probes on products.id=product_probes.product_id 
                                inner join  shopping_establishments on product_probes.shopping_establishment_id= shopping_establishments.id
                                inner join product_presentations on product_probes.product_presentation_id=product_presentations.id 
                                inner join product_categories on products.product_category_id=product_categories.id 
                                inner join product_brands on product_probes.product_brand_id=product_brands.id
                                where product_categories.category_id=$idsubcat
                                limit $limit, 10", $conexion) or die(json_encode($respuesta));
             $filas=array();
            while ($reg=mysql_fetch_assoc($registros))
            {
                
                $filas[]=array_map('utf8_encode', $reg);

            }
            
            $filas2 = array();
            $filas3= array();
            foreach ($filas as $key => $value) {
                    # code...
                $cadena=$value['name'].', '.$value['marca'].', '.$value['establecimiento'].', '.$value['presentacion'].', '.$value['price'];
                $filas2['id']=$value['id'];
                $filas2['name']=$cadena;
                $filas3[]=$filas2;
                /*array_push($filas2,$value['id'] );
                array_push($filas2, $cadena);*/
            }

         echo json_encode($filas3);
    break;
    case '21':
         $registros=mysql_query("SELECT products.id, products.name,
                                product_brands.name as marca,
                                shopping_establishments.name as establecimiento, 
                                product_presentations.name as presentacion, 
                                product_probes.price
                                from products 
                                inner join  product_probes on products.id=product_probes.product_id 
                                inner join  shopping_establishments on product_probes.shopping_establishment_id= shopping_establishments.id
                                inner join product_presentations on product_probes.product_presentation_id=product_presentations.id 
                                inner join product_categories on products.product_category_id=product_categories.id 
                                inner join product_brands on product_probes.product_brand_id=product_brands.id
                                where product_categories.category_id=$idsubcat
                                limit $limit, 10", $conexion) or die(json_encode($respuesta));
             $filas=array();
            while ($reg=mysql_fetch_assoc($registros))
            {
                
                $filas[]=array_map('utf8_encode', $reg);

            }
            
            $filas2 = array();
            $filas3= array();
            foreach ($filas as $key => $value) {
                    # code...
                $cadena=$value['name'].', '.$value['marca'].', '.$value['establecimiento'].', '.$value['presentacion'].', '.$value['price'];
                $filas2['id']=$value['id'];
                $filas2['name']=$cadena;
                $filas3[]=$filas2;
                /*array_push($filas2,$value['id'] );
                array_push($filas2, $cadena);*/
            }

         echo json_encode($filas3);
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
