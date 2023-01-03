
<?php
/* require "../asideMenu.php"; */
/* require "../plantilla.php"; */

$nombrePersonal=$_GET["nombre"];
$ruta="../../assest/dist/file/archivos/".$nombrePersonal;

?>
<!-- ELIMINAR -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistema POS</title>
  <link rel="shortcut icon" href="#">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../assest/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../assest/dist/css/adminlte.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../assest/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../assest/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../../assest/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="../../assest/plugins/datatables-css/datatables-min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="../../assest/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="../../assest/plugins/daterangepicker/daterangepicker.css">

  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../../assest/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../../assest/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../../assest/plugins/jqvmap/jqvmap.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../../assest/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

  <!-- Select2 -->
  <link rel="stylesheet" href="../../assest/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../../assest/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

  <!-- summernote -->
  <link rel="stylesheet" href="../../assest/plugins/summernote/summernote-bs4.min.css">

  <!-- dropzonejs -->
  <link rel="stylesheet" href="../../assest/plugins/dropzone/min/dropzone.min.css">
</head>
<!-- ELIMINAR PARA ARRIBA -->

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1><?php echo $nombrePersonal;?></h1>
        </div>
        <div class="col-sm-6">

        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <?php mostrar_archivos($ruta, $nombrePersonal);?>

      </div>
    </div>
  </section>
</div>
<?php

/**
* Funcion que muestra las imagenes que hay en la ruta pasada como parametro
*/
function mostrar_archivos($ruta, $nombrePersonal){
  // Se comprueba que realmente sea la ruta de un directorio
  if (is_dir($ruta)){
    // Abre un gestor de directorios para la ruta indicada
    $gestor = opendir($ruta);

    // Recorre todos los archivos del directorio
    while (($archivo = readdir($gestor)) !== false)  {
      // Solo buscamos archivos sin entrar en subdirectorios
      if (is_file($ruta."/".$archivo)) {
?>

<div class="col-md-3">
  <div class="card card-primary card-outline">
    <div class="card-body box-profile">
      <div class="text-center">
        <?php
        $trozos=explode(".",$archivo);
        $extension=end($trozos);
        if($extension=="jpg" || $extension=="png" || $extension=="JPG" || $extension=="PNG"){
        ?>
        <img class="img-fluid button" src="<?php echo $ruta."/".$archivo;?>" style="width:300px;" >
        <?php
        }else{
        ?>
        <img class="img-fluid" src="../assest/dist/img/manual/manual-img-default.png" alt="User profile picture" style="width:300px;">

        <?php
        }
        ?>

      </div>
      <h3 class="profile-username text-center"><?php echo preg_replace('[.pdf|.png]', '', $archivo) ;?></h3>

      <?php if($extension=="pdf"){
      ?>
      <a href="<?php echo $ruta."/".$archivo;?>" class="btn btn-info btn-block"
         target="_blank"><b>Visualizar</b></a>

      <?php
        }?>


      
      <button class="btn btn-danger btn-block"
              onclick="EliArchivo('<?php echo $archivo;?>','<?php echo $nombrePersonal;?>')">Eliminar</button>
      <input type="hidden" value="" id="manualPdf">
      <?php
        } ?>
    </div>
  </div>
</div>


<?php
      }            
    }

    // Cierra el gestor de directorios
    closedir($gestor);
  
}

include "../footer.php";
?>
<!-- SweetAlert2 -->
<script src="../../assest/plugins/sweetalert2/sweetalert2.min.js"></script>

<script>
    function EliArchivo(archivo,nombrePersonal){

var obj=""
Swal.fire({
  title: 'Esta seguro de eliminar este archivo?',
  showDenyButton: true,
  showCancelButton: false,
  confirmButtonText: 'Confirmar',
  denyButtonText: `Cancelar`,
}).then((result) => {
  /* Read more about isConfirmed, isDenied below */
  if (result.isConfirmed) {
    $.ajax(
      {
        type:"POST",
        data:obj,
        url:"vista/personal/EliArchivo.php?archivo="+archivo+"&nombre="+nombrePersonal,
        success:function(data){
          /* setTimeout(
            function () {
              location.reload();
            }, 1000);
 */
          console.log(data);
        }
      }
    )
  } else if (result.isDenied) {

  }
})

}
</script>