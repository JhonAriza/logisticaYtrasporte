document.addEventListener('DOMContentLoaded', function() {
  // selecciono el formulario el formulario para recolectar los datos atraves   document.querySelector("form");


const formulario = document.getElementById('form');


  var calendarEl = document.getElementById('agenda');

  var calendar = new FullCalendar.Calendar(calendarEl, {
    
    initialView: 'dayGridMonth',
    locale:"es",
    headerToolbar: {
      left: 'prev,next today',
      center: 'title',
      right: 'dayGridMmonth,timeGridWeek,listWeek'
    },
    
      dateClick:function(info){
        $("#evento").modal("show");
      }


  });

calendar.render();

document.getElementById("btnGuardar").addEventListener("click",function(){
const datos = new FormData(formulario);
console.log(datos);
console.log(formulario.id.value);
console.log(formulario.title.value);
console.log(formulario.descripcion.value);
console.log(formulario.start.value);
console.log(formulario.end.value);


axios.post("http://127.0.0.1:8000/evento", datos).
then(
  (respuesta)=>{
    $("#evento").modal("hide");
  }
).catch(
  error=>{
    if(error.response){
      console.log(error.response.data);
    }
  }
)

});

});
