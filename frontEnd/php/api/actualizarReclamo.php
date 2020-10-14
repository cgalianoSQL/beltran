<html>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</html>
<?php
    include_once 'apiReclamos.php';
    session_start();
    $api = new ApiReclamos();
    $error = '';
    if(isset($_POST['id_reclamo']) && isset($_POST['id_usuario_asignado'])){

      $tipoArchivo = $_FILES['archivo']['type'];
      $nombreArchivo = $_FILES['archivo']['name'];
      $tamanoArchivo = $_FILES['archivo']['size'];
      $imagenSubida = fopen($_FILES['archivo']['tmp_name'], 'r');
      $binariosImagen = fread($imagenSubida, $tamanoArchivo);
      $base64 = 'data:image/' . $tipoArchivo . ';base64,' . base64_encode($binariosImagen);

       $Params = array(
            'id_reclamo'  => $_POST['id_reclamo'],
            'id_usuario_asignado' => $_POST['id_usuario_asignado'],
            'comentario' => $_POST['comentario'],
            'archivo' => $base64
        );

        $jsonParams = json_encode($Params);
        ECHO $jsonParams ;

        $result = $api->actualizar($jsonParams);

            if(!$result){
              switch($_SESSION['permiso']) {
                case 'CLIENTE':
                  ?>
                  <script>
                  swal({
                      title: "ERROR QUERY",
                      icon: "error",
                      button: "OK",
                    }).then(function() {
                      window.location = "../../misReclamos.php";
                      });
                  </script>
              <?php ;
                break;
                case 'SOPORTE':
                  ?>
                  <script>
                  swal({
                      title: "ERROR QUERY",
                      icon: "error",
                      button: "OK",
                    }).then(function() {
                      window.location = "../../misReclamosSoporte.php";
                      });
                  </script>
              <?php 
              }    
        } else {

          switch($_SESSION['permiso']) {
            case 'CLIENTE':
              ?>
              <script>
              swal({
                title: "ENVIADO",
            text: "Ha enviado una respuesta corrrectamente",
            icon: "success",
            button: "OK",
          }).then(function() {
            window.location = "../../DetallesmisReclamos.php";
            });
          </script>
          <?php ;
            break;
            case 'SOPORTE':
              ?>
              <script>
              swal({
                title: "ENVIADO",
            text: "Ha enviado una respuesta corrrectamente",
            icon: "success",
            button: "OK",
          }).then(function() {
            window.location = "../../DetallemisReclamosSoporte.php";
            });
              </script>
          <?php         
              }  
            }  
      } else {

          switch($_SESSION['permiso']) {
            case 'CLIENTE':
              ?>
              <script>
            swal({
            title: "ERROR API",
            icon: "error",
            button: "OK",
          }).then(function() {
            window.location = "../../misReclamos.php";
            });
          </script>
          <?php ;
            break;
            case 'SOPORTE':
              ?>
            <script>
            swal({
            title: "ERROR API",
            icon: "error",
            button: "OK",
          }).then(function() {
            window.location = "../../misReclamosSoporte.php";
            });
            </script>
        <?php         
        } }
    ?>