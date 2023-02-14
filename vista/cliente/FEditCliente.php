<?php
//capturamos la url y separamos el nombre del cliente
$path=parse_url($_SERVER['REQUEST_URI']);
$idCliente=$path["query"];

$id = $idCliente;
$cliente = ControladorCliente::ctrInfoCliente($id);


$razonSocial = $cliente["razon_social_cliente"]; 

$rzCliente = preg_replace('([^A-Za-z0-9])', '', $razonSocial);

//desfracmentando latitud y longitud
if($cliente["ubicacion_cliente"]!=""){
  $ubicacion=explode(",",$cliente["ubicacion_cliente"]);
  $latitud=$ubicacion[0];
  $longitud=$ubicacion[1];
}else{
  $latitud=-16.2254759;
  $longitud=-68.0455585;
}


?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
  </section>

  <section class="content">
    <style> 
      #map{
        margin: 10px 10px 10px 0px;
        width: 100%;
        height: 300px;
      }
    </style>

    <form id="FormEditCliente" class="card card-primary card-outline">
      <div class="card-header">
        <h4 class="card-title" style="font-size:20px;">Actualizar datos del Cliente</h4>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>

      <div class="card-body row">

        <div class="modal-body">
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="">Razon Social</label>
                <input type="text" class="form-control" id="rsCliente" name="rsCliente" value="<?php echo $cliente["razon_social_cliente"]; ?>" readonly>
                <input type="hidden" value="<?php echo $id; ?>" name="idCliente">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="">NIT/CI</label>
                <input type="text" class="form-control" id="NitCiCliente" name="NitCiCliente" value="<?php echo $cliente["nit_ci_cliente"]; ?>" readonly>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="">Dirección</label>
                <input type="text" class="form-control" id="dirCliente" name="dirCliente" value="<?php echo $cliente["direccion_cliente"]; ?>">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="">Nombre(s)</label>
                <input type="text" class="form-control" id="nombreCliente" name="nombreCliente" value="<?php echo $cliente["nombre_cliente"]; ?>">

              </div>
            </div>

          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="">Telefono(s)</label>
                <input type="text" class="form-control" id="telCliente" name="telCliente" value="<?php echo $cliente["telefono_cliente"]; ?>">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="">Precio de entrega</label>
                <input type="number" class="form-control" id="precioEntregaCli" name="precioEntregaCli" value="<?php echo $cliente["precio_entrega"]; ?>">
              </div>
            </div>

          </div>
          <div class="row">

            <div class="col-sm-6">
              <div class="form-group">
                <label for="">Fachada <span class="breadcrumb-item active">(Peso maximo 10MB)</span></label>
                <input type="file" class="form-control" id="ImgFachada" name="ImgFachada" onchange="previsualizar_fachada()">
                <!-- <img src="assest/dist/img/fachadas/casa_default.png" class="img-thumbnail previsualizar" width="150"> -->
                <input type="hidden" id="imgActFachada" name="imgActFachada" value="<?php echo $cliente["foto_fachada"]; ?>">
                <?php
                if ($cliente["foto_fachada"] == "") {
                ?>
                <img src="assest/dist/img/fachadas/casa_default.png" class="img-thumbnail previsualizar" width="150">
                <?php
                } else {
                ?>
                <img src="assest/dist/img/fachadas/<?php echo $cliente["foto_fachada"]; ?>" class="img-thumbnail previsualizar" width="200">
                <?php
                }
                ?>
              </div>
            </div>

            <div class="col-sm-6">
              <div class="form-group">
                <label for="">Ubicación</label>

                <input type="text" class="form-control" id="ubicacionCli">
                <div id="map"></div>
                <input type="hidden" id="ubiLatitud" name="ubiLatitud" value="<?php echo $latitud;?>">
                <input type="hidden" id="ubiLongitud" name="ubiLongitud" value="<?php echo $longitud;?>">
              </div>
            </div>
          </div>
          <div class="col-sm-5 mb-0">
            <div class="form-group text-center justify-content-center align-items-center mb-0">
              <label for="">Adjuntar archivos</label>
              <button type="button" class="btn  bg-gradient-success btn-sm mb-2" style="width: 80%;" onclick="MSubirArchivosCli('<?php echo $rzCliente ?>')">
                <i class="fas fa-upload"></i> Subir archivos
              </button>
            </div>
          </div>
        </div>
      </div>

      <div class="card-footer">
        <button type="submit" class="btn btn-primary float-right">Actualizar</button>
      </div>
    </form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script>

      function iniciarMap(){

        var myLatLng={lat: <?php echo $latitud;?>, lng: <?php echo $longitud;?>}


        const options ={
          center:myLatLng,
          zoom:18,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }

        var map=document.getElementById("map")
        const mapa=new google.maps.Map(map, options)

        //editando el marcador
        const marcador=new google.maps.Marker({
          position: myLatLng,
          map:mapa,
          draggable:true
          /*title:"Mi primer marcador"*/
        })

        var informacion= new google.maps.InfoWindow({
          /*content: text*/
        })

        marcador.addListener('click', function(){
          informacion.open(mapa, marcador)
        })

        // Registrando el evento drag e imprimiendo
        google.maps.event.addListener(marcador,'drag',function(event) {
          document.getElementById("ubiLatitud").value = event.latLng.lat()
          document.getElementById("ubiLongitud").value = event.latLng.lng();
        });

        /*===========================================
    a partir de aqui se ejecuta el autocompletado
    ============================================*/
        var autocomplete=document.getElementById('ubicacionCli')

        const search = new google.maps.places.Autocomplete(autocomplete)

        //este es el evento de escucha que autocompleta
        google.maps.event.addListener(search, 'place_changed', function () {
          var near_place = search.getPlace();
        });

        search.addListener('place_changed', function(){

          informacion.close()
          marcador.setVisible(false)

          var place=search.getPlace()

          if(!place.geometry.viewport){
            window.alert("Error al mostrar el lugar")
            return
          }

          if(place.geometry.viewport){
            mapa.fitBounds(place.geometry.viewport)
          }else{
            map.setCenter(place.geometry.viewport)
            mapa.setZoom(18)
          }
          marcador.setPosition(place.geometry.location)
          marcador.setVisible(true)

          var address=""
          if(place.address_components){
            address=[
              //(place.address_components[0]&&place.address_components[0].short_name || ''),
              (place.address_components[1]&&place.address_components[1].short_name || ''),
              (place.address_components[2]&&place.address_components[2].short_name || '')
            ]
          }

          informacion.setContent('<div><strong>'+place.name+'</strong><br>'+address)
          informacion.open(map,marcador)
        })



      }
    </script>
    <!--api key google maps-->
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyD6bEfxo5LpvCiHF0z51nBsPC_OIUi6Hx4&callback=iniciarMap"></script>
  </section>
</div>