/*====================================
transformar fecha con formato ISO 8601
=====================================*/
function transformaFecha(fechaISO){
  let fecha_iso=fechaISO.split("T")
  let hora_iso=fecha_iso[1].split(".")

  let fecha=fecha_iso[0]
  let hora=hora_iso[0]

  var fecha_hora=fecha+" "+hora
  return fecha_hora
}


function busCliente(){
  let nitCliente=document.getElementById("nitCliente").value

  var obj={
    nitCliente:nitCliente
  }

  $.ajax({
    type:"POST",
    url:"controlador/clienteControlador.php?ctrBusCliente",
    data:obj,
    dataType:"json",
    success:function(data){

      if(data["email_cliente"]==""){
        document.getElementById("emailCliente").value="null"
      }else{
        document.getElementById("emailCliente").value=data["email_cliente"]
      }

      document.getElementById("rsCliente").value=data["razon_social_cliente"]
      document.getElementById("idCliente").value=data["id_cliente"]
    }
  })
}

function busCod(){
  let codProducto=document.getElementById("codProducto").value

  var obj={
    codProducto:codProducto
  }

  $.ajax({
    type:"POST",
    url:"controlador/productoControlador.php?ctrBusProducto",
    data:obj,
    dataType:"json",
    success:function(data){
      document.getElementById("conceptoProducto").value=data["nombre_producto"]
      document.getElementById("uniMedida").value=data["unidad_medida"]
      document.getElementById("preUnitario").value=data["precio_producto"]
      document.getElementById("preUnitActual").value=data["precio_producto"]

      document.getElementById("codProductoSin").value=data["cod_producto_sin"]
      document.getElementById("uniMedidaSin").value=data["unidad_medida_sin"]
    }
  })

}

/*=================
calcular costos
==================*/
function calcularPreProd(){
  let catPro=parseInt(document.getElementById("cantProducto").value)
  let preUnit=parseFloat(document.getElementById("preUnitario").value)

  document.getElementById("preTotal").value=parseFloat(catPro*preUnit)
}

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
      let fila=document.createElement("tr")

      fila.innerHTML='<td>'+data["nombre_producto"]+'</td>'+
        '<td>'+'<input type="number" class="form-control form-control-sm" id="cantPro[]" value="1" onkeyup="calcularTotal('+precioPro+')">'+'</td>'+
        '<td>'+precioPro+'</td>'+
        '<td>'+'<input class="form-control form-control-sm" id="totprePro[]" value="'+precioPro+'" readonly>'+'</td>'
      //return parseFloat(x).toFixed(2); para retornar con dos decimales
      let tdEliminar=document.createElement("td")
      let botonEliminar=document.createElement("button")
      botonEliminar.classList.add("btn", "btn-danger", "btn-sm", "borrar")
      let icono=document.createElement("i")
      icono.classList.add("fas", "fa-trash")
      botonEliminar.appendChild(icono)
      botonEliminar.onclick=()=>{
        eliminarCarrito(data["id_producto"])
      }

      tdEliminar.appendChild(botonEliminar)
      fila.appendChild(tdEliminar)

      listaDetalle.appendChild(fila)

      /*      let objDetalle={
        descripcion:data["nombre_producto"],
        precio:parseFloat(data["precio_venta_producto"])
      }
      arregloCarrito.push(objDetalle)
      dibujarTablaCarrito()*/
    }
  })



  //calcularTotal()
}

function dibujarTablaCarrito(){

  listaDetalle.innerHTML=""
  arregloCarrito.forEach((detalle)=>{
    let fila=document.createElement("tr")

    fila.innerHTML='<td>'+detalle.descripcion+'</td>'+
      '<td>'+'<input class="form-control form-control-sm" id="cantPro">'+'</td>'+
      '<td>'+detalle.precio+'</td>'+
      '<td>'+'<input class="form-control form-control-sm" id="prePro">'+'</td>'

    let tdEliminar=document.createElement("td")
    let botonEliminar=document.createElement("button")
    botonEliminar.classList.add("btn", "btn-danger", "btn-sm")
    let icono=document.createElement("i")
    icono.classList.add("fas", "fa-trash")
    botonEliminar.appendChild(icono)
    botonEliminar.onclick=()=>{
      eliminarCarrito(detalle.codigoProducto)
    }

    tdEliminar.appendChild(botonEliminar)
    fila.appendChild(tdEliminar)

    listaDetalle.appendChild(fila)
  })
}

function eliminarCarrito(id){
  $(document).on('click', '.borrar', function (event) {
    event.preventDefault();
    $(this).closest('tr').remove();
  });

}

function calcularTotal(precio){

let cantidad=document.getElementById("cantPro").value
let total=cantidad*precio
document.getElementById("totprePro").value=parseFloat(total).toFixed(2)
}

/*=================
validar formulario
==================*/
function validarFormulario(){
  let numFactura=document.getElementById("numFactura").value

  if(numFactura==null || numFactura.length==0 || /^\s+$/.test(numFactura)){
    document.getElementById("error-numFactura").innerHTML="El campo #Factura tiene datos incorrectos"
    return false
  }

  return true
}


function registroFactura(datos){
  let numFactura=parseInt(document.getElementById("numFactura").value)
  let idCliente=parseInt(document.getElementById("idCliente").value)
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

function prueba(){
  console.log("waths app")
}
