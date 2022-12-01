function MNuevoVehiculo(){
  $("#modal-default").modal("show")

  var obj=""
  $.ajax({
    type:"POST",
    url:"vista/vehiculo/FNuevoVehiculo.php",
    data:obj,
    success:function(data){
      $("#content-default").html(data)
    }
  })
}

function SinCatalogo(){
  var obj={
    codigoAmbiente: 2,
    codigoPuntoVenta: 0,
    codigoPuntoVentaSpecified: true,
    codigoSistema: "71D7A7B740E994C89373447",
    codigoSucursal: 0,
    cuis: "2E8B5B9E",
    nit: 3726922011
  }

  $.ajax({
    type:"POST",
    url:"https://localhost:5001/Sincronizacion/listaVehiculosservicios?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiJ9.eyJzdWIiOiJqd3JvYmxlcyIsImNvZGlnb1Npc3RlbWEiOiI3MUQ3QTdCNzQwRTk5NEM4OTM3MzQ0NyIsIm5pdCI6Ikg0c0lBQUFBQUFBQUFETTJOekt6TkRJeU1EUUVBSTlYR3pjS0FBQUEiLCJpZCI6NzEwNTQ5LCJleHAiOjE2NzUzODI0MDAsImlhdCI6MTY0Mzk0NTI1Niwibml0RGVsZWdhZG8iOjM3MjY5MjIwMTEsInN1YnNpc3RlbWEiOiJTRkUifQ.nS8t-EDaBi-e3PGtnbnTI-7PKPy_6Kia1zFPKdzZgDnZ6VfXlimlrTsEgTb8_iDKoJ7Hy-vLw_0o_vgpLqSltA",
    data:JSON.stringify(obj),
    cache:false,
    contentType:"application/json",
    success:function(data){

      for(var i=0;i<data["listaCodigos"].length;i++){

        $("#CatVehiculos").append("<tr><td>"+data["listaCodigos"][i]["codigoActividad"]+"</td><td>"+data["listaCodigos"][i]["codigoVehiculo"]+"</td><td>"+data["listaCodigos"][i]["descripcionVehiculo"]+"</td><td></td></tr>")
      }

    }
  })
}

function RegVehiculo(){

  var formData= new FormData($("#FormRegVehiculo")[0])

  $.ajax({
    type:"POST",
    url:"controlador/VehiculoControlador.php?ctrRegVehiculo",
    data:formData,
    cache:false,
    contentType:false,
    processData:false,
    success:function(data){
      console.log(data)
      if(data=="ok"){
        Swal.fire({
          icon: 'success',
          showConfirmButton: false,
          title: 'El Vehiculo ha sido registrado',
          timer: 1000
        })
        setTimeout(function(){
          location.reload()
        },1200)
      }else{
        Swal.fire({
          icon:'error',
          title:'Error!',
          text:'Erro de registro!!!',
          showConfirmButton: false,
          timer:1500
        })
      }
    }
  })


}

function MEditVehiculo(id){
  $("#modal-lg").modal("show")

  var obj=""
  $.ajax({
    type:"POST",
    url:"vista/Vehiculo/FEditVehiculo.php?id="+id,
    data:obj,
    success:function(data){
      $("#content-lg").html(data)
    }
  })
}

function EditVehiculo(){

  var formData= new FormData($("#FormEditVehiculo")[0])

  $.ajax({
    type:"POST",
    url:"controlador/VehiculoControlador.php?ctrEditVehiculo",
    data:formData,
    cache:false,
    contentType:false,
    processData:false,
    success:function(data){
      if(data=="ok"){
        Swal.fire({
          icon: 'success',
          showConfirmButton: false,
          title: 'El Vehiculo ha sido actualizado',
          timer: 1000
        })
        setTimeout(function(){
          location.reload()
        },1200)
      }else{
        Swal.fire({
          icon:'error',
          title:'Error!',
          text:'No se ha podido actualizar!!!',
          showConfirmButton: false,
          timer:1500
        })
      }
    }
  })

}

function MVerVehiculo(id){
  $("#modal-lg").modal("show")

  var obj=""
  $.ajax({
    type:"POST",
    url:"vista/Vehiculo/MVerVehiculo.php?id="+id,
    data:obj,
    success:function(data){
      $("#content-lg").html(data)
    }
  })
}

function MEliVehiculo(id){
  var obj={
    id:id
  }

  Swal.fire({
    title:'Esta seguro de eliminar este Vehiculo?',
    showDenyButton:true,
    showCancelButton:false,
    confirmButtonText:'Confirmar',
    denyButtonText:'Cancelar'    
  }).then((result)=>{
    if(result.isConfirmed){
      $.ajax({
        type:"POST",
        data:obj,
        url:"controlador/VehiculoControlador.php?ctrEliVehiculo",
        success:function(data){

          if(data=="ok"){
            location.reload()
          }else{
            Swal.fire({
              icon:'error',
              title:'Error!!!',
              text:'El Vehiculo no puede ser eliminado',
              showConfirmButton:false,
              time:1500
            })
          }
        }
      })



    }
  })
}
/*

function previsualizar(){
  let imagen=document.getElementById("ImgVehiculo").files[0]

  if(imagen["type"]!="image/png" && imagen["type"]!="image/jpeg"){
    $("#ImgVehiculo").val("")
    swal.fire({
      icon:"error",
      showConfirmButton:true,
      title:"La imagen debe ser formato PNG o JPG"
    })
  }else if(imagen["size"]>10000000){
    $("#ImgVehiculo").val("")
    Swal.fire({
      icon: "error",
      showConfirmButton:true,
      title: "La imagen no debe superior a 10MB"
    })

  }else{
    let datosImagen=new FileReader
    datosImagen.readAsDataURL(imagen)

    $(datosImagen).on("load", function(event){
      let rutaImagen=event.target.result
      $(".previsualizar").attr("src", rutaImagen)

    })
  }
}
*/
