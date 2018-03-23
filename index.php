  <!DOCTYPE html>
  <html>
  <?php require_once('includes/session.php'); ?>
  <?php require_once('includes/header.php'); ?>

  <body >
    <?php require_once('includes/nav.php'); ?>


      <main class="container">

        <div class="row">
          <div align="center" class="col s12 m12 l12">
            <p></p>
            <h5><strong><?php if(isset($_SESSION['perfiles_user']) ){echo "Busqueda avanzada: Usuario: ".$_SESSION['perfiles_user'];}?></strong></h5>
            <h5 id="error">Cantidad de Graduados</h5>
          </div>
        </div>
        <div class="row">
          <div align="center" class="col s12 m12 l12">
            <?php require("filtros_pais.php");?>
          </div>
        </div>
          <?php
          if (!empty($_GET)) {
            require_once('includes/busqueda-avanzada.php');
          }
            ?>
        </div>
        </div>
       </div>
      </main>
      <script type="text/javascript">

      window.onload = function() {
        switch ("<?php echo $_GET['cumpleanosInput']?>" ) {
          case '01':
            var mes='ENERO';
            break;
            case '02':
              var mes='FEBRERO';
              break;
              case '03':
                var mes='MARZO';
                break;
                case '04':
                  var mes='ABRIL';
                  break;
                  case '05':
                    var mes='MAYO';
                    break;
                    case '06':
                      var mes='JUNIO';
                      break;
                      case '07':
                        var mes='JULIO';
                        break;
                        case '08':
                          var mes='AGOSTO';
                          break;
                          case '09':
                            var mes='SEPTIEMBRE';
                            break;
                            case '10':
                              var mes='OCTUBRE';
                              break;
                              case '11':
                                var mes='NOVIEMBRE';
                                break;
                                case '12':
                                  var mes='DICIEMBRE';
                                  break;

        }


        document.getElementById(mes).children[0].textContent='check_circle';
      };

      </script>


        <?php require_once('includes/footer.php'); ?>
  </body>

  </html>




  <!--

  `ID`, `codigo`, `nombres`, `apellidos`, `nacionalidad`, `genero`, `programa`  `orientacion`  `dia_graduacion`, `mes_graduacion`, `estatus`, `lugar_pasantia`, `exp_pasantia`, `area_investigacion`, `asesor_tesis`, `url_pasantia`, `titulo`, `pa`, `fecha_nacimiento`, `financiado_por`, `direccion`, `email`, `telefono`, `movil`, -->
