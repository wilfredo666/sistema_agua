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

function RegVehiculo(){

  var formData= new FormData($("#FormRegVehiculo")[0])

  $.ajax({
    type:"POST",
    url:"controlador/vehiculoControlador.php?ctrRegVehiculo",
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
  $("#modal-default").modal("show")

  var obj=""
  $.ajax({
    type:"POST",
    url:"vista/vehiculo/FEditVehiculo.php?id="+id,
    data:obj,
    success:function(data){
      $("#content-default").html(data)
    }
  })
}

function EditVehiculo(){

  var formData= new FormData($("#FormEditVehiculo")[0])

  $.ajax({
    type:"POST",
    url:"controlador/vehiculoControlador.php?ctrEditVehiculo",
    data:formData,
    cache:false,
    contentType:false,
    processData:false,
    success:function(data){
      /* console.log(data); */
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
          /* console.log(data) */
          if (data == "ok") {
            Swal.fire({
              icon: 'success',
              showConfirmButton: false,
              title: 'Vehiíulo eliminado',
              timer: 1000
            })
            setTimeout(function () {
              location.reload()
            }, 1200)
          } else {
            Swal.fire({
              icon: 'error',
              title: 'Error!!!',
              text: 'El Vehículo no puede ser eliminado, porque tiene registros',
              showConfirmButton: false,
              timer: 1500
            })
          }
        }
      })



    }
  })
}


function previsualizar_vehiculo(){
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

