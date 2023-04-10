// inicializo el calendario  y cuando se cargue el contenido se ejecuta el escript de abajo
document.addEventListener('DOMContentLoaded', function () {
  // selecciono el formulario el formulario para recolectar los datos atraves   document.querySelector("form");

//ago referencia al formulario selecionando el formulario con id del  form 
  const formulario = document.getElementById('form');
// buscamos un div para convertirlo en un calendario    document.getElementById('agenda');
  var calendarEl = document.getElementById('agenda');

  var calendar = new FullCalendar.Calendar(calendarEl, {
// se inicializa  ajustando estas opciones  de full calendar
    initialView: 'dayGridMonth',
    displayEventTime:false,
    locale: "es",
    headerToolbar: {
      left: 'prev,next today',
      center: 'title',
      right: 'dayGridMonth'
    },
    // atraves del dato events de full calendar que  atener la url de consulta 
    events: baseURL+"/evento/mostrar",
    // al precionar un dia del calendario aparece el modal 

    dateClick: function (info) {
      // se resetea el formulario 
    
      formulario.reset();
        // y se asigna  las fechas  e su formato correspondiente
      formulario.start.value = info.dateStr;
      formulario.end.value = info.dateStr;

      //el modal tiene el nombre #evento y lo activo al dar click en un dia del calendario
      $("#evento").modal("show");
    },
    // en el parametro info nos devuelve el dia que se presiono
    
    // funcion de fullcalendar
    eventClick: function (info) {
      // info va a tener todos los datos del elemneto seleccionado
      var evento = info.event;
// se le envia el parametro id
      axios.post(baseURL+"/evento/editar/" + info.event.id).
        then(
          //obtenemos los datos 
          (respuesta) => {
            //  mostrar el modal
            // llega la informacion en data y se muestra cada parametro    
            // se recupera la informacion 
            formulario.id.value = respuesta.data.id;
            formulario.title.value = respuesta.data.title;
            formulario.descripcion.value = respuesta.data.descripcion;
            formulario.start.value = respuesta.data.start;
            formulario.end.value = respuesta.data.end;

            $("#evento").modal("show");

            calendar.refetchEvents();
          }
        ).catch(
          error => {
            if (error.response) {
              console.log(error.response.data);
            }
          }
        )
    }

  });

  calendar.render();

// se recibe el 

  document.getElementById("btnEliminar").addEventListener("click", function () {
    enviarDatos("/evento/borrar/" + formulario.id.value);
  });

  document.getElementById("btnModificar").addEventListener("click", function () {
    enviarDatos("/evento/actualizar/" + formulario.id.value);

  });
  // capturamos la accion del boton con el id btnGuardar
  // capturamos la accion con addEventListener atraves de detectar un click
  document.getElementById("btnGuardar").addEventListener("click", function () {

    enviarDatos("/evento");
  });
  // se crea una funcion enviar datos
  // se le pasa el parametro url
  function enviarDatos(url) {

// en la variable datos recupero la informacion va agarrar la informacion
// atraves de FormData(formulario); 
    const datos = new FormData(formulario);

    const nuevaURL = baseURL+url;
// en axios nos permite enviar los datos    atraves de la url 
//se envia atraves del metodo post
    axios.post(nuevaURL, datos).
    //se va amostrar la informacion atravez de la ruta
    // si el envio es exitoso se ecibe una respuesta 
      then(
        (respuesta) => {
          // se etuliza para actualizar
          calendar.refetchEvents();
          // si hay una respuesta se oculta el modal con hide
          $("#evento").modal("hide");


        }
        // si genera un error muestra  
      ).catch(
        error => {
          if (error.response) {
            // si hay 1 error de response muestra response.data es que muestra 
            // la informacion que va allegar
            console.log(error.response.data);
          }
        }
      )
  }
});
