(function(win,doc){
    'use strict';
    
  //Exibir calendario 
    function getCalendar(perfil, div)
    {// variavel  calendarEl  receberá a class do css calendar
    let calendarEl=doc.querySelector(div);

    // variavel calendar é uma instancia do full calendar , serve para renderizar o calendario 
    let calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        headerToolbar:{
          start: 'prev next today', 
          center: 'title',
          end: 'dayGridMonth, timeGridWeek, timeGridDay'
         },
         // traduzindo o idioma dos botões Mês, dia, semana e dia  
         buttonText:{
          today:    'Hoje',
          month:    'Mês',
          week:     'Semana',
          day:      'Dia'
        
         },
         
         // serve para  mudar o idioma do calendario 
         locale:'pt-br',
         
         dateClick: function(info) {
           if(perfil=='manager'){
            calendar.changeView('timeGrid', info.dateStr);
                
           }else{
             if (info.view.type == 'dayGridMonth'){
               calendar.changeView('timeGrid', info.dateStr);
             }else{
               win.location.href='/views/user/add.php?date='+info.dateStr;
               
             }
           }
          // Onde o Usuario clickar mudará e cor a celula do calendario 
            // change the day's background color just for fun
            //info.dayEl.style.backgroundColor = 'blue';
           // info.dayEl.style.color='white';
        },
        events: '/controllers/ControllerEvents.php',
        eventClick: function(info) { 
          if(perfil == 'manager'){
            // 'RecebeIdModal' pega o valor de Id do evento so que de forma oculta , através do input
      info.jsEvent.preventDefault(); // don't let the browser navigate
            $('#id_M').text(info.event.id);
            $('#title_M').text(info.event.title);
            $('#start_M').text(info.event.start.toLocaleString());
            $('#end_M').text(info.event.end.toLocaleString());
            $('#description_M').text(info.event.extendedProps.description);
            $('#campus_M').text(info.event.extendedProps.campus);
            $('#reserva_M').text(info.event.extendedProps.reserva);
            $('#recebeIDModal').val(info.event.id);
            $('#visualizar_M').modal('show');
            // win.location.href='/views/manager/editar.php?id=' + info.event.id;
          }else{
            info.jsEvent.preventDefault(); // don't let the browser navigate
            $('#id').text(info.event.id);
            $('#title').text(info.event.title);
            $('#start').text(info.event.start.toLocaleString());
            $('#end').text(info.event.end.toLocaleString());
            $('#description').text(info.event.extendedProps.description);
            $('#campus').text(info.event.extendedProps.campus);
            $('#reserva').text(info.event.extendedProps.reserva);
            $('#recebeIDModal').val(info.event.id);
            $('#visualizar').modal('show');
            // win.location.href='/views/manager/editar.php?id=' + info.event.id;
            // win.location.href='/views/user/view?id=' + info.event.id;
            
          
        //     alert('Event:  ' + info.event.title+"\n\n"+
        //   'Inicio:  ' + info.event.start+"\n\n"+'Fim:  '+info.event.end);
        //  info.el.style.background='grey';
        //   info.el.style.borderColor = 'black';
          }
          
        },
        
        // eventClick: function(info) { 
        //   if(perfil == 'user'){
        //     info.jsEvent.preventDefault(); // don't let the browser navigate
        //     $('#id').text(info.event.id);
        //     $('#title').text(info.event.title);
        //     $('#start').text(info.event.start.toLocaleString());
        //     $('#end').text(info.event.end.toLocaleString());
        //     $('#description').text(info.event.extendedProps.description);
        //     $('#campus').text(info.event.extendedProps.campus);
        //     $('#reserva').text(info.event.extendedProps.reserva);
        //     $('#visualizar').modal('show');
          
        //   }else{
        //     win.location.href='/views/manager/editar.php?id=' + info.event.id;
        //   }
        // },

        
      });
      
      calendar.render();
    }
    if (doc.querySelector('.calendarUser')){
      getCalendar('user','.calendarUser');
    }else if(doc.querySelector('.calendarManager')){
      getCalendar('manager','.calendarManager');
    }
    
})(window,document)

// recebe o id do campo oculto  e direciona para o editar 
function editar(){
  const idEditar = $('#recebeIDModal').val();
  window.location.href='/views/manager/editar.php?id=' + idEditar;
}

// recebe o id do campo oculto  e direciona para o deletar 
function deletar(){
  const deletar = $('#recebeIDModal').val();
  window.location.href='../controllers/ControllerDeletar.php?id='+ deletar;
}

function email(){
  const email = action="<?php echo DIRPAGE . 'controllers/ControllerAdd.php'; ?>";
  window.location.href='../../email/email.php'+ email;
}