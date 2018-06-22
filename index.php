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
            <h5 id="error">Cantidad Total de</br> Graduados</h5>
          </div>
        </div>
        <div class="row">

          <div class="col s3"><p></p></div>
          <div class="col s8"><?php require("filtros_pais.php");?></div>
        </div>
        </div>
        </div>
        </div>
       </div>
      </main>
        <?php require_once('includes/footer.php'); ?>
  </body>
  <a href="#0" class="cd-top js-cd-top">Top</a>
  <script src="includes/back-to-top/back-to-top.js"></script>
  </html>
