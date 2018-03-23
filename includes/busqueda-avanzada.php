<?php
// Aqui validamos si la variable $_GET["busca"] existe como validacion
 // Si es que esta cargando la pagina o haciendo una bsuqueda.
if(empty($_GET))
{
 ?>
 <div align="center">
 <?php
 echo '<h3><p><strong>ENTER TO SEARCH</strong></p></h3>';;
   // si es una Busqueda entrara en este siguente IF lo cual iniciara el proceso
}elseif(!empty($_GET)){
   // Sustituimos caracteres especiales para que el servidor no lo determine como codigo
    // $busca=htmlspecialchars($_GET["busca"]);
     //  Validacion interna de lo valores en el campo de busqueda
     require_once('conexion.php');
     $query="";
     foreach ($_GET as $key => $value) {
       switch ($key) {
         case 'codigoInput':
               if ($query=="") {
                 $query= $query." codigo LIKE '%".$value."%'";
               }else{
               $query= $query." AND codigo LIKE '%".$value."%'";
               }
           break;
         case 'nombresInput':
               if ($query=="") {
                 $query= $query." nombres LIKE '%".$value."%'";
               }else{
               $query= $query." AND nombres LIKE '%".$value."%'";
               }
           break;
         case 'apellidosInput':
               if ($query=="") {
                 $query= $query." apellidos LIKE '%".$value."%'";
               }else{
               $query= $query." AND apellidos LIKE '%".$value."%'";
               }
           break;
           case 'claseInput':
               if ($query=="") {
                 $query= $query." clase LIKE '%".$value."%'";
               }else{
               $query= $query." AND clase LIKE '%".$value."%'";
               }
           break;
           case 'carreraInput':
               // if ($value=='0777' || $value=='07771' || $value=='07772' || $value=='07773' || $value=='07774' || $value=='077711' || $value=='077721' || $value=='077731' || $value=='077741') { $carrera='0777'; }

               switch ($value) {
                 case '07771':
                     $carrera='0777';
                    if ($query=="") {
                       $query= $query." programa LIKE '%".$carrera."%' AND orientacion LIKE 'INGENIERIA AGRONOMICA'";
                     }else{
                     $query= $query." AND programa LIKE '%".$carrera."%' AND orientacion LIKE 'INGENIERIA AGRONOMICA'";
                     }
                   break;
                 case '07772':
                     $carrera='0777';
                    if ($query=="") {
                       $query= $query." programa LIKE '%".$carrera."%' AND orientacion LIKE 'INGENIERO EN AGROINDUSTRIA ALIMENTARIA'";
                     }else{
                     $query= $query." AND programa LIKE '%".$carrera."%' AND orientacion LIKE 'INGENIERO EN AGROINDUSTRIA ALIMENTARIA'";
                     }
                   break;
                 case '07773':
                     $carrera='0777';
                    if ($query=="") {
                       $query= $query." programa LIKE '%".$carrera."%' AND orientacion LIKE 'INGENIERO EN ADMINISTRACION DE AGRONEGOCIOS'";
                     }else{
                     $query= $query." AND programa LIKE '%".$carrera."%' AND orientacion LIKE 'INGENIERO EN ADMINISTRACION DE AGRONEGOCIOS'";
                     }
                   break;
                 case '07774':
                     $carrera='0777';
                    if ($query=="") {
                       $query= $query." programa LIKE '%".$carrera."%' AND orientacion LIKE 'INGENIERO EN AMBIENTE Y DESARROLLO'";
                     }else{
                     $query= $query." AND programa LIKE '%".$carrera."%' AND orientacion LIKE 'INGENIERO EN AMBIENTE Y DESARROLLO'";
                     }
                   break;
                 case '077721':
                     $carrera='0777';
                    if ($query=="") {
                       $query= $query." programa LIKE '%".$carrera."%' AND orientacion LIKE 'AGROINDUSTRIA'";
                     }else{
                     $query= $query." AND programa LIKE '%".$carrera."%' AND orientacion LIKE 'AGROINDUSTRIA'";
                     }
                   break;
                 case '077731':
                     $carrera='0777';
                    if ($query=="") {
                       $query= $query." programa LIKE '%".$carrera."%' AND orientacion LIKE 'GESTION DE AGRONEGOCIOS'";
                     }else{
                     $query= $query." AND programa LIKE '%".$carrera."%' AND orientacion LIKE 'GESTION DE AGRONEGOCIOS'";
                     }
                   break;
                 case '077741':
                     $carrera='0777';
                    if ($query=="") {
                       $query= $query." programa LIKE '%".$carrera."%' AND orientacion LIKE 'DESARROLLO SOCIOECONOMICO Y AMBIENTE'";
                     }else{
                     $query= $query." AND programa LIKE '%".$carrera."%' AND orientacion LIKE 'DESARROLLO SOCIOECONOMICO Y AMBIENTE'";
                     }
                   break;
                   default:
                    $carrera=$value;
                     if ($query=="") {
                         $query= $query." programa LIKE '%".$carrera."%'";
                       }else{
                       $query= $query." AND programa LIKE '%".$carrera."%'";
                       }
                     break;


               }



// value="07771">INGENIERIA AGRONOMICA</option>
// value="07772">INGENIERO EN AGROINDUSTRIA
// value="07773">INGENIERO EN ADMINISTRACION DE
// value="07774">INGENIERO EN AMBIENTE Y
// value="077711">INGENIERIA AGRONOMICA</option>
// value="077721">AGROINDUSTRIA</option>
// value="077731">GESTION DE AGRONEGOCIOS</option
// value="077741">DESARROLLO SOCIOECONOMICO Y


           break;
           case 'paisInput':
               if ($query=="") {
                 $query= $query." nacionalidad LIKE '%".$value."%'";
               }else{
               $query= $query." AND nacionalidad LIKE '%".$value."%'";
               }
           break;
           case 'generoInput':
               if ($query=="") {
                 $query= $query." genero LIKE '%".$value."%'";
               }else{
               $query= $query." AND genero LIKE '%".$value."%'";
               }
           break;
           case 'cumpleanosInput':
               if ($query=="") {
                 $query= $query." fecha_nacimiento LIKE '____-".$value."-__'";
               }else{
               $query= $query." AND fecha_nacimiento LIKE '____-".$value."-__'";
               }
           break;
       }
     }
}

// $sql = "SELECT * FROM `graduat3s` WHERE `codigo`=9078 AND `nombres`=\'SINDY PAOLY\' AND `apellidos`=\'PALMA BARRIENTOS\' AND `clase`=2009 AND `programa`=0777 AND `nacionalidad`=\'HONDURAS\' AND `genero`=\'F\'";

     $busqueda="SELECT * FROM graduat3s WHERE ".$query;


     //cambiar nombre de la tabla de busqueda
// http://localhost/lista-de-graduados/Perfiles-Materialize/busqueda-avanzada.php?codigoInput=11&nombresInput=maicol&apellidosInput=urquia+lara&claseInput=1946&carreraInput=07771&paisInput=SK&generoInput=F&direccionInput=croacia+calle+2&ubicacionInput=zamorano&cumpleanosInput=2017-11-16


     //$busqueda="SELECT * FROM graduat3s WHERE apellidos LIKE '%".$query."%'";
     //cambiar nombre de la tabla de busqueda
// http://localhost/lista-de-graduados/Perfiles-Materialize/busqueda-avanzada.php?codigoInput=11&nombresInput=maicol&apellidosInput=urquia+lara&claseInput=1946&carreraInput=07771&paisInput=SK&generoInput=F&direccionInput=croacia+calle+2&ubicacionInput=zamorano&cumpleanosInput=2017-11-16


     $resultado = $mysqli->query($busqueda);
      //Ejecución de la consulta
           //Si hay resultados...
$meses = ['ENERO','FEBRERO','MARZO', 'ABRIL', 'MAYO', 'JUNIO', 'JULIO', 'AGOSTO', 'SEPTIEMBRE', 'OCTUBRE', 'NOVIEMBRE', 'DICIEMBRE'];


     if ($resultado->num_rows > 0){
       $registros = '<h4 align="center"><p><strong>HEMOS ENCONTRADO ' . $resultado->num_rows . ' REGISTRO(S) QUE CUMPLEN AÑOS EL MES DE '.$meses[intval($_GET['cumpleanosInput'])-1].' </strong></p></h4>';

       echo '
        <table class="centered">
         <thead>
           <tr>
               <th>CLASE</th>
               <th>NOMBRE</th>
               <th>TÍTULO</th>
               <th>NACIONALIDAD</th>
               <th>FECHA DE NACIMIENTO</th>
           </tr>
         </thead>

          ';
       ?><div>

     <?php
     echo $registros;
     echo '<div class=" ">
           <div class="row">';

     while($f=$resultado->fetch_assoc()){
         $date = strtotime($f['fecha_nacimiento']);
         $datef = strtotime($f['date_deceased']);
         $img='';
         $img_fallecido='';
         $Titulo='';
         $boton='';
         $cumpleanos='';
         $card_action='';
         if (file_exists("img/profile_pictures/".$f['ID'].".jpg")) {
           $img="img/profile_pictures/".$f['ID'].".jpg";
         }elseif(!file_exists("img/profile_pictures/".$f['ID'].".jpg"))
           {
              if($f['genero']=='M') {
                 $img="img/MASCULINO.jpg";
               }elseif ($f['genero']=='F') {
                 $img="img/FEMENINO.jpg";
               }
           }
           if($f['genero']=='M') {
              $f['genero']='MASCULINO';
            }elseif ($f['genero']=='F') {
              $f['genero']='FEMENINO';
            }

           if ($f['programa']=='0077') {
               $Titulo='AGRONOMO';
               $card_action='<p>Título PIA: </br><strong>INGENIERO AGRONOMO ('.$f['anioIA'].') </strong></p>
                             <p>Orientación: </br><strong>'.$f['orientacion'].'</strong></p>
                             <p>Título del proyecto de graduación: </br><strong>'.$f['titulo_tesis'].'</strong></p>
                             <p>Áreas de interés: </br><strong>'.$f['area_interes'].'</strong></p>
                             <a class="waves-effect waves-light btn-large ripple-effect" target="_blank" style="background-color:#e8ac35" href="'.$f['url_tesis'].'"><i class="material-icons left">library_books</i>Tesis digital </a>';
           }
           if ($f['programa']=='0707') {
               $Titulo='AGRONOMO';
               $card_action='<p>Título PPIA: </br><strong>INGENIERO AGRONOMO ('.$f['anioIA'].') </strong></p>
                             <p>Orientación: </br><strong>'.$f['orientacion'].'</strong></p>
                             <p>Título del proyecto de graduación: </br><strong>'.$f['titulo_tesis'].'</strong></p>

                             <p>Áreas de interés: </br><strong>'.$f['area_interes'].'</strong></p>
                             <a class="waves-effect waves-light btn-large ripple-effect" target="_blank" style="background-color:#e8ac35" href="'.$f['url_tesis'].'"><i class="material-icons left">library_books</i>Tesis digital </a>';
           }
           if ($f['programa']=='0007') {
               $Titulo='AGRONOMO';
               $card_action='';
           }
           if ($f['programa']=='0777') {
               $Titulo='INGENIERO AGRONOMO';
               $card_action='<p>Orientación: <strong>'.$f['orientacion'].'</strong></p>
               <p>Título del proyecto de graduación:</br> <strong>'.$f['titulo_tesis'].'</strong></p>

                             <p>Áreas de interés:</br> <strong>'.$f['area_interes'].'</strong></p>
                             <p>Lugar donde realizó su pasantía:</br> <strong>'.$f['lugar_pasantia'].'</strong></p>
                             <p>Experiencia de trabajo obtenia en su pasantía:</br> <strong>'.$f['exp_pasantia'].'</strong></p>
                             <p>Asesor de Tesis:</br> <strong>'.$f['asesor_tesis'].'</strong></p>
                             <a class="waves-effect waves-light btn-large ripple-effect" target="_blank" style="background-color:#e8ac35" href="'.$f['url_tesis'].'"><i class="material-icons left">library_books</i>Tesis digital </a>';
           }
           if ($f['programa']=='0777') {
           if ($f['orientacion']=='INGENIERIA AGRONOMICA') {
               $Titulo='INGENIERO AGRONOMO';
           }
           if ($f['orientacion']=='AGROINDUSTRIA ALIMENTARIA') {
               $Titulo='INGENIERO EN AGROINDUSTRIA ALIMENTARIA';
           }
           if ($f['orientacion']=='ADMINISTRACION DE AGRONEGOCIOS') {
               $Titulo='INGENIERO EN ADMINISTRACION DE AGRONEGOCIOS';
           }
           if ($f['orientacion']=='DESARROLLO SOCIOECONOMICO Y AMBIENTE') {
               $Titulo='INGENIERO EN DESARROLLO SOCIOECONOMICO Y AMBIENTE';
           }
           if ($f['orientacion']=='AMBIENTE Y DESARROLLO') {
               $Titulo='INGENIERO EN AMBIENTE Y DESARROLLO';
           }
           }
           if(isset($_SESSION['perfiles_user']) ){
           $boton='<a href="editar-perfil.php?id='.$f['ID'].'&pais_reside='.$f['pais_reside'].'&ciudad='.$f['ciudad'].'&url_tesis='.$f['url_tesis'].'&nickname='.$f['nickname'].'&deceased='.$f['deceased'].'&date_deceased='.$f['date_deceased'].'&movil='.$f['movil'].'&telefono='.$f['telefono'].'&email='.$f['email'].'&direccion='.$f['direccion'].'&financiado_por='.$f['financiado_por'].'&otras_entidades='.$f['otras_entidades'].'&asesor_tesis='.$f['asesor_tesis'].'&clase='.$f['clase'].'&codigo='.$f['codigo'].'&nombres='.$f['nombres'].'&apellidos='.$f['apellidos'].'&nacionalidad='.$f['nacionalidad'].'&genero='.$f['genero'].'&programa='.$f['programa'].'&orientacion='.$f['orientacion'].'&diaGraduacion='.$f['dia_graduacion'].'&mesGraduacion='.$f['mes_graduacion'].'&estatus='.$f['estatus'].'&lugarPasantia='.$f['lugar_pasantia'].'&areaInvestigacion='.$f['area_investigacion'].'&titulo_tesis='.$f['titulo_tesis'].'&pa='.$f['pa'].'&fechaNacimiento='.$f['fecha_nacimiento'].'&anioIA='.$f['anioIA'].'&codigoIA='.$f['codigoIA'].'&exp_pasantia='.$f['exp_pasantia'].'&area_interes='.$f['area_interes'].'" class="btn-floating btn-move-up waves-effect waves-light ripple-effect red darken-2 btn-large right">
                         <i class="material-icons">edit</i>
                       </a>';
           }
           if($f['deceased']=='1') {
                    $f['deceased']='SI';
                    $img_fallecido="img/cruz_fallecido.svg";
                    $fechaf='';
                  }elseif ($f['deceased']=='0') {
                    $f['deceased']='NO';
                    $fechaf='';
                    $cumpleanos='<p>'.date('d/m/Y', $datef).'</strong></p>';
                    $cumpleanos='<td align="left">'.$f['clase'].'</td><td align="left">'. $f['nombres'].' '.$f['apellidos'] .'</td><td align="left">'.$Titulo.'</td><td align="left">'.$f['nacionalidad'].'</td><td align="left">'.date('d/m/Y', $date).'</td>';
                  }


           echo '
             <tbody>
               <tr>
               '.$cumpleanos.'
               </tr>
             </tbody>
              ';
       } echo '</table>';
     }else{
           $registros = '<h4><p><strong>HEMOS ENCONTRADO ' . $resultado->num_rows . ' REGISTROS </strong></p></h4>';?>
           <?php
           echo $registros;
         }



?>



<!-- http://localhost/lista-de-graduados/Perfiles-Materialize/busqueda-avanzada.php?codigoInput=codigo&nombresInput=nombres&apellidosInput=apellidos&claseInput=1946&paisInput=honduras&generoInput=femenino&direccionInput=guayaquil&ubicacionInput=2222&cumpleanosInput=11-enero-2016# -->
