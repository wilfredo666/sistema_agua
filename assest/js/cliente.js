function MNuevoCliente() {
  window.location="FNuevoCliente";
}

function RegCliente() {

  var formData = new FormData($("#FormRegCliente")[0])

  $.ajax({
    type: "POST",
    url: "controlador/clienteControlador.php?ctrRegCliente",
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
    success: function (data) {

      if (data == "ok") {
        Swal.fire({
          icon: 'success',
          showConfirmButton: false,
          title: 'El cliente ha sido registrado',
          timer: 1000
        })
        setTimeout(function () {
          location.reload()
        }, 1200)
      } else {
        Swal.fire({
          icon: 'error',
          title: 'Error!',
          text: 'Error de registro!',
          showConfirmButton: false,
          timer: 1500
        })
      }
    }
  })


}

function MEditCliente(id) {
window.location="FEditCliente?"+id;
}

function EditCliente() {

  var formData = new FormData($("#FormEditCliente")[0])

  $.ajax({
    type: "POST",
    url: "controlador/clienteControlador.php?ctrEditCliente",
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
    success: function (data) {
      if (data == "ok") {
        Swal.fire({
          icon: 'success',
          showConfirmButton: false,
          title: 'El cliente ha sido actualizado',
          timer: 1000
        })
        setTimeout(function () {
          location.reload()
        }, 1200)
      } else {
        Swal.fire({
          icon: 'error',
          title: 'Error!',
          text: 'No se ha podido actualizar!!!',
          showConfirmButton: false,
          timer: 1500
        })
      }
    }
  })

}

function MVerCliente(id) {
  $("#modal-lg").modal("show")

  var obj = ""
  $.ajax({
    type: "POST",
    url: "vista/cliente/MVerCliente.php?id=" + id,
    data: obj,
    success: function (data) {
      $("#content-lg").html(data)
    }
  })
}

function MEliCliente(id) {
  var obj = {
    id: id
  }

  Swal.fire({
    title: 'Esta seguro de eliminar este Cliente?',
    showDenyButton: true,
    showCancelButton: false,
    confirmButtonText: 'Confirmar',
    denyButtonText: 'Cancelar'
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: "POST",
        data: obj,
        url: "controlador/ClienteControlador.php?ctrEliCliente",
        success: function (data) {
          if (data == "ok") {
            Swal.fire({
              icon: 'success',
              showConfirmButton: false,
              title: 'Cliente eliminado',
              timer: 1000
            })
            setTimeout(function () {
              location.reload()
            }, 1200)
          } else {
            Swal.fire({
              icon: 'error',
              title: 'Error!!!',
              text: 'El Cliente no puede ser eliminado, porque tiene registros',
              showConfirmButton: false,
              timer: 1500
            })
          }
        }
      })
    }
  })
}

function previsualizar_fachada() {
  let imagen = document.getElementById("ImgFachada").files[0]

  if (imagen["type"] != "image/png" && imagen["type"] != "image/jpeg") {
    $("#ImgFachada").val("")
    swal.fire({
      icon: "error",
      showConfirmButton: true,
      title: "La imagen debe ser formato PNG o JPG"
    })
  } else if (imagen["size"] > 10000000) {
    $("#ImgFachada").val("")
    Swal.fire({
      icon: "error",
      showConfirmButton: true,
      title: "La imagen no debe superior a 10MB"
    })

  } else {
    let datosImagen = new FileReader
    datosImagen.readAsDataURL(imagen)

    $(datosImagen).on("load", function (event) {
      let rutaImagen = event.target.result
      $(".previsualizar").attr("src", rutaImagen)

    })
  }
}

/* SUBIR ARCHIVOS CON DROPZONE  */
function MSubirArchivosCli(rzCliente) {
  $("#modal-lg").modal("hide")
  $('#modal-lg2').modal('show');
  var obj = "";
  $.ajax({
    type: "POST",
    url: "vista/cliente/MSubirArchivosCli.php?nombre=" + rzCliente,
    data: obj,
    success: function (data) {
      /* $("#formulario").html(data); */
      /* console.log(data); */
      $("#content-lg2").html(data)
    }
  })
  /* console.log(rzCliente) */
}

/*function MVerUbicacionCliente(id){
    $("#modal-default").modal("show")

  var obj=""
  $.ajax({
    type:"POST",
    url:"vista/cliente/MostrarUbicacion.php",
    data:obj,
    success:function(data){
      $("#content-default").html(data)
    }
  })
}*/


