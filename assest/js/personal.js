function MNuevoPersonal(){
  $("#modal-lg").modal("show")

  var obj=""
  $.ajax({
    type:"POST",
    url:"vista/personal/FNuevoPersonal.php",
    data:obj,
    success:function(data){
      $("#content-lg").html(data)
    }
  })
}

function Regpersonal(){
  let passpersonal=document.getElementById("passpersonal").value
  let passpersonal2=document.getElementById("passpersonal2").value

  if(passpersonal==passpersonal2){

    var formData= new FormData($("#FormRegpersonal")[0])

    $.ajax({
      type:"POST",
      url:"controlador/personalControlador.php?ctrRegpersonal",
      data:formData,
      cache:false,
      contentType:false,
      processData:false,
      success:function(data){
        if(data=="ok"){
          Swal.fire({
            icon: 'success',
            showConfirmButton: false,
            title: 'El personal ha sido registrado',
            timer: 1000
          })
          setTimeout(function(){
            location.reload()
          },1200)
        }else{
          Swal.fire({
            icon:'error',
            title:'Error!',
            text:'El personal ya esta en uso',
            showConfirmButton: false,
            timer:1500
          })
        }
      }
    })
  }else{
    document.getElementById("error-pass").innerHTML="Los campos de contraseña no coinciden"
  }

}

function MEditpersonal(id){
  $("#modal-default").modal("show")

  var obj=""
  $.ajax({
    type:"POST",
    url:"vista/personal/FEditpersonal.php?id="+id,
    data:obj,
    success:function(data){
      $("#content-default").html(data)
    }
  })
}

function Editpersonal(){
  let passpersonal=document.getElementById("passpersonal").value
  let passpersonal2=document.getElementById("passpersonal2").value

  if(passpersonal==passpersonal2){

    var formData= new FormData($("#FormEditpersonal")[0])

    $.ajax({
      type:"POST",
      url:"controlador/personalControlador.php?ctrEditpersonal",
      data:formData,
      cache:false,
      contentType:false,
      processData:false,
      success:function(data){
        if(data=="ok"){
          Swal.fire({
            icon: 'success',
            showConfirmButton: false,
            title: 'El personal ha sido actualizado',
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
  }else{
    document.getElementById("error-pass").innerHTML="Los campos de contraseña no coinciden"
  }

}

function MVerpersonal(id){
  $("#modal-default").modal("show")

  var obj=""
  $.ajax({
    type:"POST",
    url:"vista/personal/MVerpersonal.php?id="+id,
    data:obj,
    success:function(data){
      $("#content-default").html(data)
    }
  })
}

function MElipersonal(id){
  var obj={
    id:id
  }

  Swal.fire({
    title:'Esta seguro de eliminar este personal?',
    showDenyButton:true,
    showCancelButton:false,
    confirmButtonText:'Confirmar',
    denyButtonText:'Cancelar'    
  }).then((result)=>{
    if(result.isConfirmed){
      $.ajax({
        type:"POST",
        data:obj,
        url:"controlador/personalControlador.php?ctrElipersonal",
        success:function(data){

          if(data=="ok"){
            location.reload()
          }else{
            Swal.fire({
              icon:'error',
              title:'Error!!!',
              text:'El personal no puede ser eliminado, porque esta activo',
              showConfirmButton:false,
              timer:1500
            })
          }
        }
      })

    }
  })
}

function Comprobarpersonal(){
  let loginpersonal=document.getElementById("loginpersonal").value
  var obj={
    login:loginpersonal
  }
  $.ajax({
    type: "POST",
    data: obj,
    url: "controlador/personalControlador.php?ctrBuspersonal",
    success:function(data){
      if(data=="1"){
        $("#error-login").addClass("text-danger")
        document.getElementById("error-login").innerHTML="personal en uso, intente con otro"
        $("#guardar").attr("disabled", true)
      }else{
        document.getElementById("error-login").innerHTML=""
        $("#guardar").removeAttr("disabled")
      }
    }

  })
}