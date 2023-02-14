//esta funcion se ejecuta por llamado de callback (obligatorio)
function iniciarMap(){

  const ubicacion= new Localizacion(()=>{

    var myLatLng={lat: ubicacion.latitude, lng:ubicacion.longitude}


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

  })

  }
