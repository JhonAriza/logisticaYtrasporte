document.addEventListener('DOMContentLoaded', function () {
  // selecciono el formulario el formulario para recolectar los datos atraves   document.querySelector("form");


  const formulario = document.getElementById('form');


  var calendarEl = document.getElementById('agenda');

  var calendar = new FullCalendar.Calendar(calendarEl, {

    initialView: 'dayGridMonth',
    displayEventTime:false,
    locale: "es",
    headerToolbar: {
      left: 'prev,next today',
      center: 'title',
      right: 'dayGridMonth'
    },
    events: baseURL+"/evento/mostrar",
    dateClick: function (info) {
      formulario.reset();
      formulario.start.value = info.dateStr;
      formulario.end.value = info.dateStr;

      $("#evento").modal("show");
    },
    eventClick: function (info) {
      var evento = info.event;
      axios.post(baseURL+"/evento/editar/" + info.event.id).
        then(
          (respuesta) => {
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



  document.getElementById("btnEliminar").addEventListener("click", function () {
    enviarDatos("/evento/borrar/" + formulario.id.value);
  });

  document.getElementById("btnModificar").addEventListener("click", function () {
    enviarDatos("/evento/actualizar/" + formulario.id.value);

  });
  document.getElementById("btnGuardar").addEventListener("click", function () {

    enviarDatos("/evento");
  });
  function enviarDatos(url) {


    const datos = new FormData(formulario);

    const nuevaURL = baseURL+url;
    axios.post(nuevaURL, datos).
      then(
        (respuesta) => {
          calendar.refetchEvents();
          $("#evento").modal("hide");


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
