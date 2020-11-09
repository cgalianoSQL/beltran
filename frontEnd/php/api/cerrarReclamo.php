<html>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</html>
<?php
    include_once 'apiReclamos.php';
    session_start();
    $api = new ApiReclamos();
    $error = '';
    if(isset($_POST['id_reclamo']) && isset($_POST['id_usuario_asignado'])){
 
      if ($_FILES['archivo']['size'] > 0)
      {
        $tipoArchivo = $_FILES['archivo']['type'];
        $nombreArchivo = $_FILES['archivo']['name'];
        $tamanoArchivo = $_FILES['archivo']['size'];
        $imagenSubida = fopen($_FILES['archivo']['tmp_name'], 'r');
        $binariosImagen = fread($imagenSubida, $tamanoArchivo);
        $base64 = 'data:image/' . $tipoArchivo . ';base64,' . base64_encode($binariosImagen);
      } else {
        $imagenSubida = fopen("../../img/imagen.jpg", 'r');
        $binariosImagen = fread($imagenSubida, 3000000);
        $base64 = 'data:image/jpg;base64,' . base64_encode($binariosImagen);
      }

       $Params = array(
            'id_reclamo'  => $_POST['id_reclamo'],
            'id_usuario_asignado' => $_POST['id_usuario_asignado'],
            'comentario' => $_POST['comentario'],
            'archivo' => $base64
        );

        $jsonParams = json_encode($Params);

        $result = $api->cerrar($jsonParams);
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
                    window.location = "../../misReclamos.php?id=<?php  ECHO $_POST['id_reclamo'] ?>";
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
                    window.location = "../../misReclamosSoporte.php?id=<?php  ECHO $_POST['id_reclamo'] ?>";
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
                  title: "Cerrado",
                  text: "Se cerro la instancia corrrectamente",
                  icon: "success",
                  button: "OK",
                }).then(function() {
                  window.location = "../../DetallesmisReclamos.php?id=<?php  ECHO $_POST['id_reclamo'] ?>";
                  });
            </script>
          <?php ;
          break;
          case 'SOPORTE':
          ?>
            <script>
            swal({
              title: "Cerrado",
              text: "Se cerro la instancia corrrectamente",
              icon: "success",
              button: "OK",
            }).then(function() {
              window.location = "../../DetallemisReclamosSoporte.php?id=<?php  ECHO $_POST['id_reclamo'] ?>";
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