function descPreProducto(){
  let descProducto=parseFloat(document.getElementById("descProducto").value)
  let preUnitActual=parseFloat(document.getElementById("preUnitActual").value)

  document.getElementById("preUnitario").value=parseFloat(preUnitActual-descProducto)

  calcularPreProd()
}

/*==========
carrito
============*/
var arregloCarrito=[]
var listaDetalle=document.getElementById("listaDetalle")

function agregarCarrito(id){
  var obj={
    idProducto:id
  }

  $.ajax({
    type:"POST",
    url:"controlador/productoControlador.php?ctrBusProducto",
    data:obj,
    dataType:"json",
    success:function(data){
      let precioPro=data["precio_venta_producto"]
      let objDetalle={
        idProducto:data["id_producto"],
        descProducto:data["nombre_producto"],
        cantProducto:1,
        precioProducto:precioPro,
        precioTotalPro:precioPro
      }

      arregloCarrito.push(objDetalle)
      dibujarTablaCarrito()
    }
  })

  //calcularTotal()
}

function dibujarTablaCarrito(){

  listaDetalle.innerHTML=""
  arregloCarrito.forEach((detalle)=>{
    let fila=document.createElement("tr")

    fila.innerHTML='<td>'+detalle.descProducto+'</td>'+
      '<td><input type="number" class="form-control form-control-sm" id="cantPro_'+detalle.idProducto+'" value="'+detalle.cantProducto+'" onkeyup="calcularPreProd('+detalle.idProducto+')">'+'</td>'+
      '<td>'+detalle.precioProducto+'</td>'+
      '<td>'+detalle.precioTotalPro+'</td>'

    let tdEliminar=document.createElement("td")
    let botonEliminar=document.createElement("button")
    botonEliminar.classList.add("btn", "btn-danger", "btn-sm", "borrar")
    let icono=document.createElement("i")
    icono.classList.add("fas", "fa-trash")
    botonEliminar.appendChild(icono)
    botonEliminar.onclick=()=>{
      eliminarCarrito(detalle.idProducto)
    }

    tdEliminar.appendChild(botonEliminar)
    fila.appendChild(tdEliminar)

    listaDetalle.appendChild(fila)
  })

  calcularTotal()
}

function eliminarCarrito(idProd){

  arregloCarrito=arregloCarrito.filter((detalle)=>{
    if(idProd!=detalle.idProducto){
      return detalle
    }
  })

  dibujarTablaCarrito()

}

function calcularPreProd(idProd){
  let cantPro=parseInt(document.getElementById("cantPro_"+idProd).value)

  arregloCarrito.map(function(dato){
    if(dato.idProducto==idProd){
      dato.precioTotalPro=parseFloat(dato.precioProducto*cantPro).toFixed(2)
      dato.cantProducto=cantPro
    }
    return dato
  })
  dibujarTablaCarrito()
}

function calcularTotal(){
  let totalCarrito=0

  for(var i=0; i<arregloCarrito.length; i++){
    totalCarrito=totalCarrito+parseFloat(arregloCarrito[i].precioTotalPro)
  }

  document.getElementById("totalNE").innerHTML=(totalCarrito).toFixed(2)
}

function validarFormulario(){
  let numFactura=document.getElementById("numFactura").value

  if(numFactura==null || numFactura.length==0 || /^\s+$/.test(numFactura)){
    document.getElementById("error-numFactura").innerHTML="El campo #Factura tiene datos incorrectos"
    return false
  }

  return true
}

function emitirNotaEntrega(){
  let chofer=parseInt(document.getElementById("chofer").value)
  let vehiculo=parseInt(document.getElementById("vehiculo").value)
  let zonaVenta=document.getElementById("zonaVenta").value

  let obj={
    "chofer":chofer,
    "vehiculo":vehiculo,
    "zonaVenta":zonaVenta,
    "productos":JSON.stringify(arregloCarrito)
  }

  $.ajax({
    type:"POST",
    url:"controlador/ventaControlador.php?ctrRegNotaVenta",
    data:obj,
    cache:false,
    success:function(data){
      if(data=="ok"){
        Swal.fire({
          icon: 'success',
          showConfirmButton: false,
          title: 'Nota de Entrega registrada',
          timer: 1000
        })
        setTimeout(function(){
          location.reload()
        },1200)
      }else{
        Swal.fire({
          icon:'error',
          title:'Error!',
          text:'Error de registro',
          showConfirmButton: false,
          timer:1500
        })
      }
    }
  })

}

function registroFactura(datos){

  let usuarioLogin=document.getElementById("usuarioLogin").innerHTML
  let totApagar=parseFloat(document.getElementById("totApagar").value)
  let descAdicional=parseFloat(document.getElementById("descAdicional").value)
  let subTotal=parseFloat(document.getElementById("subTotal").value)
  let fechaEmision=transformaFecha(datos["sentDate"])

  let obj={
    "numFactura":numFactura,
    "idCliente":idCliente,
    "productos":JSON.stringify(arregloCarrito),
    "subTotal":subTotal,
    "descAdicional":descAdicional,
    "totApagar":totApagar,
    "fechaEmision":fechaEmision,
    "cufd":cufd,
    "cuf":datos["cuf"],
    "xml":datos["xml"],
    "usuarioLogin":usuarioLogin,
    "leyenda":leyenda
  }

  $.ajax({
    type:"POST",
    url:"controlador/ventaControlador.php?ctrRegistroFactura",
    data:obj,
    cache:false,
    success:function(data){

      if(data=="ok"){
        Swal.fire({
          icon: 'success',
          showConfirmButton: false,
          title: 'Factura registrada',
          timer: 1000
        })
        setTimeout(function(){
          location.reload()
        },1200)
      }else{
        Swal.fire({
          icon:'error',
          title:'Error!',
          text:'Error de registro',
          showConfirmButton: false,
          timer:1500
        })
      }
    }
  })
}

function MVerFactura(id){
  $("#modal-xl").modal("show")

  var obj=""
  $.ajax({
    type:"POST",
    url:"vista/factura/VerFactura.php?id="+id,
    data:obj,
    success:function(data){
      $("#content-xl").html(data)
    }
  })
}

function MEliFactura(cuf){

  var obj={
    codigoAmbiente: 2,
    codigoPuntoVenta: 0,
    codigoPuntoVentaSpecified: true,
    codigoSistema: codSistema,
    codigoSucursal: 0,
    nit:nitEmpresa,
    codigoDocumentoSector:1,
    codigoEmision:1,
    codigoModalidad: 2,
    cufd:cufd,
    cuis:cuis,
    tipoFacturaDocumento:1,
    codigoMotivo:1,
    cuf:cuf
  }

  Swal.fire({
    title:'Esta seguro de anular esta Factura?',
    showDenyButton:true,
    showCancelButton:false,
    confirmButtonText:'Confirmar',
    denyButtonText:'Cancelar'    
  }).then((result)=>{
    if(result.isConfirmed){

      $.ajax({
        type:"POST",
        url:host+"/api/CompraVenta/anulacion",
        data:JSON.stringify(obj),
        cache:false,
        contentType:"application/json",
        processData:false,
        success:function(data){
          console.log(data)
          if(data["codigoEstado"]==905){
            anularFactura(cuf)
            Swal.fire({
              icon: 'success',
              showConfirmButton: false,
              title: 'Factura anulada',
              timer: 1000
            })
            setTimeout(function(){
              location.reload()
            },1200)
          }else{
            Swal.fire({
              icon:'error',
              title:'Error!!!',
              text:'Anulacion rechazada',
              showConfirmButton:false,
              timer:1500
            })
          }

        }
      })

    }
  })
}

function MVerNotaEntrega(id){
    $("#modal-xl").modal("show")

  var obj=""
  $.ajax({
    type:"POST",
    url:"vista/factura/VerNotaEntrega.php?id="+id,
    data:obj,
    success:function(data){
      $("#content-xl").html(data)
    }
  })
}
