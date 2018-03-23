<?php
			require("includes/conexion.php");

      $busqueda="select nacionalidad, sum(case when genero like '%F%' then 1 else 0 end) as Femenino, sum(case when genero like '%M%' then 1 else 0 end) as Masculino, count('%M%'+'%F%') as Total from graduat3s where genero like '%F%' OR genero like '%M%' group by nacionalidad ORDER BY nacionalidad ASC";

      $resultado = $mysqli->query($busqueda);

        echo '
         <table class="centered">
          <thead>
            <tr>
                <th>PAÍS</th>
                <th>FEMENINO</th>
                <th>MASCULINO</th>
                <th>TOTAL</th>
            </tr>
            <tr>
          </thead>
          <tbody>
           ';
        ?><div>

      <?php
      echo '<div class=" ">
            <div class="row">';
      $totalgraduados=0;
      $sumatotalm=0;
      $sumatotalf=0;
      while($f=$resultado->fetch_assoc()){
					$sumaHombre=$f['Masculino'];
					$sumaMujeres=$f['Femenino'];
          $suma=$f['Total'];
          $sumatotalm=$sumatotalm+$f['Masculino'];
          $sumatotalf=$sumatotalf+$f['Femenino'];
          $totalgraduados=$totalgraduados+$f['Femenino']+$f['Masculino'];
    echo '
        <tr>
        <td align="left">'.$f['nacionalidad'].'</td>
        <td align="left">'.$sumaHombre.'</td>
        <td align="left">'.$sumaMujeres.'</td>
        <td align="left">'.$suma.'</td>
        </tr>
        ';}
     echo '<td align="left"><strong>TOTAL</strong></td>
        <td><strong>'.$sumatotalf.'</strong></td>
        <td><strong>'.$sumatotalm.'</strong></td>
        <td><strong>'.$totalgraduados.'</strong></td>
  </tr></table></tbody>';
?>
