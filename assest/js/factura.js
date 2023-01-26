/*==========
carrito
============*/
var arregloCarrito = []
var listaDetalle = document.getElementById("listaDetalle")

function agregarCarrito(id) {
  var obj = {
    idProducto: id
  }

  $.ajax({
    type: "POST",
    url: "controlador/productoControlador.php?ctrBusProducto",
    data: obj,
    dataType: "json",
    success: function (data) {
      let objDetalle = {
        idProducto: data["id_producto"],
        descProducto: data["nombre_producto"],
        cantProducto: 1,
      }

      arregloCarrito.push(objDetalle)
      dibujarTablaCarrito()
    }
  })

  //calcularTotal()
}

function dibujarTablaCarrito() {

  listaDetalle.innerHTML = ""
  arregloCarrito.forEach((detalle) => {
    let fila = document.createElement("tr")

    fila.innerHTML = '<td>' + detalle.descProducto + '</td>' +
      '<td><input type="number" class="form-control form-control-sm" id="cantPro_' + detalle.idProducto + '" value="' + detalle.cantProducto + '" onkeyup="cantidadProd(' + detalle.idProducto + ')">' + '</td>'

    let tdEliminar = document.createElement("td")
    let botonEliminar = document.createElement("button")
    botonEliminar.classList.add("btn", "btn-danger", "btn-sm", "borrar")
    let icono = document.createElement("i")
    icono.classList.add("fas", "fa-trash")
    botonEliminar.appendChild(icono)
    botonEliminar.onclick = () => {
      eliminarCarrito(detalle.idProducto)
    }

    tdEliminar.appendChild(botonEliminar)
    fila.appendChild(tdEliminar)

    listaDetalle.appendChild(fila)
  })

}

function eliminarCarrito(idProd) {

  arregloCarrito = arregloCarrito.filter((detalle) => {
    if (idProd != detalle.idProducto) {
      return detalle
    }
  })

  dibujarTablaCarrito()

}


function cantidadProd(idProd) {
  let cantPro = parseInt(document.getElementById("cantPro_" + idProd).value)

  arregloCarrito.map(function (dato) {
    if (dato.idProducto == idProd) {
      //dato.precioTotalPro = parseFloat(dato.precioProducto * cantPro).toFixed(2)
      dato.cantProducto = cantPro
    }
    return dato
  })
  //dibujarTablaCarrito()
}

function validarFormulario() {
  let numFactura = document.getElementById("numFactura").value

  if (numFactura == null || numFactura.length == 0 || /^\s+$/.test(numFactura)) {
    document.getElementById("error-numFactura").innerHTML = "El campo #Factura tiene datos incorrectos"
    return false
  }

  return true
}

function emitirNotaEntrega() {

  let chofer = parseInt(document.getElementById("chofer").value)
  let vehiculo = parseInt(document.getElementById("vehiculo").value)
  let zonaVenta = document.getElementById("zonaVenta").value

  let obj = {
    "chofer": chofer,
    "vehiculo": vehiculo,
    "zonaVenta": zonaVenta,
    "productos": JSON.stringify(arregloCarrito)
  }

  $.ajax({
    type: "POST",
    url: "controlador/ventaControlador.php?ctrRegNotaEntrega",
    data: obj,
    cache: false,
    success: function (data) {

      if (data == "ok") {
        Swal.fire({
          icon: 'success',
          showConfirmButton: false,
          title: 'Nota de Entrega registrada',
          timer: 1000
        })
        setTimeout(function () {
          location.reload()
        }, 1200)
      } else {
        Swal.fire({
          icon: 'error',
          title: 'Error!',
          text: 'Error de registro',
          showConfirmButton: false,
          timer: 1500
        })
      }
    }
  })


}

function MVerFactura(id) {
  $("#modal-xl").modal("show")

  var obj = ""
  $.ajax({
    type: "POST",
    url: "vista/factura/VerFactura.php?id=" + id,
    data: obj,
    success: function (data) {
      $("#content-xl").html(data)
    }
  })
}

function MEliFactura(cuf) {

  var obj = {
    codigoAmbiente: 2,
    codigoPuntoVenta: 0,
    codigoPuntoVentaSpecified: true,
    codigoSistema: codSistema,
    codigoSucursal: 0,
    nit: nitEmpresa,
    codigoDocumentoSector: 1,
    codigoEmision: 1,
    codigoModalidad: 2,
    cufd: cufd,
    cuis: cuis,
    tipoFacturaDocumento: 1,
    codigoMotivo: 1,
    cuf: cuf
  }

  Swal.fire({
    title: 'Esta seguro de anular esta Factura?',
    showDenyButton: true,
    showCancelButton: false,
    confirmButtonText: 'Confirmar',
    denyButtonText: 'Cancelar'
  }).then((result) => {
    if (result.isConfirmed) {

      $.ajax({
        type: "POST",
        url: host + "/api/CompraVenta/anulacion",
        data: JSON.stringify(obj),
        cache: false,
        contentType: "application/json",
        processData: false,
        success: function (data) {
          console.log(data)
          if (data["codigoEstado"] == 905) {
            anularFactura(cuf)
            Swal.fire({
              icon: 'success',
              showConfirmButton: false,
              title: 'Factura anulada',
              timer: 1000
            })
            setTimeout(function () {
              location.reload()
            }, 1200)
          } else {
            Swal.fire({
              icon: 'error',
              title: 'Error!!!',
              text: 'Anulacion rechazada',
              showConfirmButton: false,
              timer: 1500
            })
          }

        }
      })

    }
  })
}

function MVerNotaEntrega(id) {
  $("#modal-xl").modal("show")

  var obj = ""
  $.ajax({
    type: "POST",
    url: "vista/factura/VerNotaEntrega.php?id=" + id,
    data: obj,
    success: function (data) {
      $("#content-xl").html(data)
    }
  })
}

/* Buscar datos del cliente */
function busCliente(){
  let nitCliente=document.getElementById("nitCliente").value
  /*   console.log(nitCliente) */
  var obj={
    nitCliente:nitCliente
  }

  $.ajax({
    type:"POST",
    url:"controlador/clienteControlador.php?ctrBusCliente",
    data:obj,
    dataType:"json",
    success:function(data){
      /* console.log(data) */
      document.getElementById("rsCliente").value=data["razon_social_cliente"]
      document.getElementById("idCliente").value=data["id_cliente"]
    }
  })
}

/*==========
carrito2
============*/
var arregloCarrito2 = []
var listaDetalle2 = document.getElementById("listaDetalle2")

function agregarCarrito2(id) {
  var obj = {
    idProducto: id
  }

  $.ajax({
    type: "POST",
    url: "controlador/productoControlador.php?ctrBusProducto",
    data: obj,
    dataType: "json",
    success: function (data) {
      let objDetalle = {
        idProducto: data["id_producto"],
        descProducto: data["nombre_producto"],
        cantProducto: 1,
        preUnitario: 0,
        preTotal: 0,
      }

      arregloCarrito2.push(objDetalle)
      dibujarTablaCarrito2()
    }
  })
}

function dibujarTablaCarrito2() {

  listaDetalle2.innerHTML = ""
  arregloCarrito2.forEach((detalle) => {
    let fila = document.createElement("tr")

    fila.innerHTML = '<td>' + detalle.descProducto + '</td>' +

      '<td><input type="number" class="form-control form-control-sm" id="cantProV_' + detalle.idProducto + '" value="' + detalle.cantProducto + '" onkeyup="calcularPreProdVenta(' + detalle.idProducto + ')">' + '</td>' +

      '<td><input type="number" class="form-control form-control-sm" id="preUnitV_' + detalle.idProducto + '" value="' + detalle.preUnitario + '" onkeyup="calcularPreProdVenta(' + detalle.idProducto + ')">' + '</td>' +


      '<td><input type="number" class="form-control form-control-sm" id="totalV_' + detalle.idProducto + '" value="' + detalle.preTotal + '" readonly>' + '</td>'   
    /* +
      '<td>'+detalle.precioProducto+'</td>'+
      '<td>'+detalle.precioTotalPro+'</td>' */

    let tdEliminar = document.createElement("td")
    let botonEliminar = document.createElement("button")
    botonEliminar.classList.add("btn", "btn-danger", "btn-sm", "borrar")
    let icono = document.createElement("i")
    icono.classList.add("fas", "fa-trash")
    botonEliminar.appendChild(icono)
    botonEliminar.onclick = () => {
      eliminarCarrito2(detalle.idProducto)
    }

    tdEliminar.appendChild(botonEliminar)
    fila.appendChild(tdEliminar)

    listaDetalle2.appendChild(fila)
  })
}

function eliminarCarrito2(idProd) {

  arregloCarrito2 = arregloCarrito2.filter((detalle) => {
    if (idProd != detalle.idProducto) {
      return detalle
    }
  })
  dibujarTablaCarrito2()
}
/* arreglar funcion calcular precio total */
function calcularPreProdVenta(idProd) {
  let cantidad = parseInt(document.getElementById("cantProV_" + idProd).value)
  let preUnit = parseFloat(document.getElementById("preUnitV_" + idProd).value)
  //let total = parseFloat(document.getElementById("totalV_" + idProd).value)
  document.getElementById("totalV_" + idProd).value=parseFloat(cantidad*preUnit)

  arregloCarrito2.map(function (dato) {
    //console.log(dato);
    if (dato.idProducto == idProd) {
      dato.preUnitario = preUnit
      dato.cantProducto = cantidad
      dato.preTotal = parseFloat(preUnit*cantidad)
    }
    return dato 
  })
  //dibujarTablaCarrito2()
  calcularTotal()
}
/**/
function descPreProducto() {
  let descProducto = parseFloat(document.getElementById("descProducto").value)
  let preUnitActual = parseFloat(document.getElementById("preUnitActual").value)

  document.getElementById("preUnitario").value = parseFloat(preUnitActual - descProducto)

  calcularPreProd()
}

function calcularTotal() {
  let totalCarrito = 0

  for (var i = 0; i < arregloCarrito2.length; i++) {
    totalCarrito = totalCarrito + parseFloat(arregloCarrito2[i].preTotal)
  }

   document.getElementById("totalVenta").innerHTML=(totalCarrito).toFixed(2) 
}

function emitirFactura(){
  
  let numFactura = document.getElementById("numFactura").value
  let nitCliente = document.getElementById("nitCliente").value
  let rsCliente = document.getElementById("rsCliente").value
  let personal = document.getElementById("personal").value

  let obj = {
    "numFactura": numFactura,
    "nitCliente": nitCliente,
    "rsCliente": rsCliente,
    "personal": personal,
    "productos": JSON.stringify(arregloCarrito2)
  }

  $.ajax({
    type: "POST",
    url: "controlador/ventaControlador.php?ctrRegNotaVenta",
    data: obj,
    cache: false,
    success: function (data) {

      if (data == "ok") {
        Swal.fire({
          icon: 'success',
          showConfirmButton: false,
          title: 'Nota de Venta registrada',
          timer: 1000
        })
        setTimeout(function () {
          location.reload()
        }, 1200)
      } else {
        Swal.fire({
          icon: 'error',
          title: 'Error!',
          text: 'Error de registro',
          showConfirmButton: false,
          timer: 1500
        })
      }
    }
  })

}
