<?php
			require("includes/conexion.php");

      $busqueda="select nacionalidad,
			sum(case when genero like '%F%' then 1 else 0 end) as Femenino,
			sum(case when genero like '%M%' then 1 else 0 end) as Masculino,
			count('%M%'+'%F%') as Total
			from graduat3s
			where genero like '%F%' OR genero like '%M%'
			group by nacionalidad
			ORDER BY nacionalidad ASC";

      $resultado = $mysqli->query($busqueda);

			echo '
			 <table class="striped centered">
				<thead>
					<tr style="background:#c9c9c9;font-size: 12px;">
							<th style="width:30%">PAÍS</th>
							<th style="width:23%">FEMENINO</th>
							<th style="width:23%">MASCULINO</th>
							<th style="width:20%">TOTAL</th>
					</tr>
					<tr>
				</thead>
				<tbody>
				 ';
        ?>
      <?php
      echo '<div class=" ">
            <div class="row">';
      $totalgraduados=0;
      $sumatotalm=0;
      $sumatotalf=0;
			$img='';
      $numero_paises = 0;
			while($f=$resultado->fetch_assoc()){
					$sumaHombre=$f['Masculino'];
					$sumaMujeres=$f['Femenino'];
          $suma=$f['Total'];
          $sumatotalm=$sumatotalm+$f['Masculino'];
          $sumatotalf=$sumatotalf+$f['Femenino'];
          $totalgraduados=$totalgraduados+$f['Femenino']+$f['Masculino'];

						$img="img/paises/".$f['nacionalidad'].".png";
						if($f['nacionalidad']=='ESPAÑA') {
							 $img="img/paises/ESPANA.png";
						 }if ($f['nacionalidad']=='CANADÁ') {
							 $img="img/paises/CANADA.png";
						 }
						 $numero_paises ++;
						// if (file_exists("img/paises/".$f['nacionalidad'].".png")) {
	          //   $img="img/paises/".$f['nacionalidad'].".png";
	          // }elseif(!file_exists("img/profile_pictures/".$f['nacionalidad'].".jpg"))
	          //   {
	          //      if($f['nacionalidad']=='ALEMANIA') {
	          //         $img="img/paises/alemania.png";
	          //       }if ($f['nacionalidad']=='BRASIL') {
	          //         $img="img/paises/brasil.png";
	          //       }if ($f['nacionalidad']=='ARGENTINA') {
	          //         $img="img/paises/argentina.png";
	          //       }
	          //   }
    echo '
		</div>
        <tr>
        <td align="centered" style="text-align: left; font-size:12px;"><strong>'.$numero_paises.'-</strong> <img alt="" class="banderas" src="'.$img.'" style="width: 15px;"><font style="text-transform: capitalize;"> '.$f['nacionalidad'].'</font></td>
        <td align="centered">'.$sumaHombre.'</td>
        <td align="centered">'.$sumaMujeres.'</td>
        <td align="centered"><strong>'.$suma.'</strong></td>
        </tr>
        ';}
     echo '
        <thead>
        <tr style="background:#c9c9c9;">
          <th align="centered" ><strong>TOTAL</strong></th>
          <th align="centered"><strong>'.$sumatotalf.'</strong></th>
          <th align="centered"><strong>'.$sumatotalm.'</strong></th>
          <th align="centered"><strong>'.$totalgraduados.'</strong></th>
        </tr>
          </thead>
  </tr></table></tbody>';
?>
