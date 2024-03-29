<?php
//capturamos la url y separamos el nombre del cliente
$path=parse_url($_SERVER['REQUEST_URI']);
$nombrePersonal=$path["query"];

$ruta="assest/dist/file/archivos/".$nombrePersonal;

?>
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
    //abre gestor de directorio
    $gestor = opendir($ruta);

    //Recorre todos los archivos del directorio
    while (($archivo = readdir($gestor)) !== false)  {
      //Solo buscamos archivos sin entrar en subdirectorios
      if (is_file($ruta."/".$archivo)) {
?>
<div class="col-md-3">
  <div class="card card-primary card-outline">
    <div class="card-body box-profile">
      <div class="text-center">
        <?php
        $trozos=explode(".",$archivo);
        $extension=end($trozos);
        if($extension=="jpg" || $extension=="png"){
        ?>
        <img class="img-fluid button" src="<?php echo $ruta."/".$archivo;?>" style="width:300px;">
        <?php
        }else{
        ?>
        <img class="img-fluid button" src="assest/dist/img/manual-img-default.png" style="width:150px;">
        <?php
        }
        ?>
        <h3 class="profile-username text-center"><?php echo preg_replace('[.pdf|.png|.pdf]', '', $archivo) ;?></h3>
        <?php if($extension=="pdf"){
        ?>
        <a href="<?php echo $ruta."/".$archivo;?>" class="btn btn-info btn-block"
           target="_blank"><b>Visualizar</b></a>
        <?php
        }
        ?>
        <button class="btn btn-danger btn-block"
                onclick="EliArchivo('<?php echo $archivo;?>','<?php echo $nombrePersonal;?>')">Eliminar</button>

      </div>
    </div>
  </div>
</div>
<?php
      }
    }
    //cierra gestor de directorio
    closedir($gestor);

  }else{
    echo "<p class='text-muted'>Sin archivos para mostrar</p>";
  }

}

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
