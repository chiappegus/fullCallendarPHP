function chequeoArea(x, y) {
    var chequeoArea = false;
    console.log("X: " + X + ", Y: " + Y);
    var link = $('#external-events');
    var offset = link.offset();
    var top = offset.top;
    var left = offset.left;
    var bottom = top + link.outerHeight();
    var right = left + link.outerWidth();
    console.log(bottom, top);
    console.log(left, right);
    console.log(chequeoArea);
    if (left < X && X < right && bottom > Y && Y > top) {
        chequeoArea = true;
    }
    if (!(left < X && X < right && bottom > Y && Y > top)) {
        chequeoArea = false;
    }
    return chequeoArea;
}
$(document).ready(function() {
    /* initialize the external events
      -----------------------------------------------------------------*/
    $('.fc-event').each(function() {
        $(this).data('event', {
            title: $.trim($(this).text()),
            stick: true
        });
        $(this).draggable({
            zIndex: 999,
            revert: true,
            revertDuration: 0
        });
    });
});
$('#start_hour').timepicker({
    altField: '#timepicker_alt_input'
});
$('#end_hour').timepicker({
    altField: '#timepicker_alt_input',
});
$('#timepicker_date_obj_inline').timepicker();
$("#external-events").droppable({
    drop: function(event, ui) {
        $(this).addClass("ui-state-highlight")
    }
});
$('.calendario').fullCalendar({
    weekends: false, //, // will hide Saturdays and Sundays
    //  dayClick: function() {
    //      alert('a day has been clicked!');
    events: '../server/getEvents.php',
    eventDragStart: function() {
        cambiar()
    },
    eventDragStop: function() {
        volver()
    },
    dayClick: function(date, jsEvent, view) {
        console.log('clicked on ' + date.format())
    },
    editable: true,
    droppable: true,
    eventDrop: function(event, delta, revertFunc) {
        volver()
        console.log(chequeoArea);
        if (!confirm("Confirma que realmente cambias el día?")) {
            revertFunc();
        } else {
            updateQuery(event.id, event.start.format(), event.end.format())
        }
    },
    eventDragStop: function(event, jsEvent, ui, view) {
        volver()
        var a = jsEvent;
        console.log(a);
        if (isElemOverDiv(jsEvent, $('div#external-events'))) {
            console.log(isElemOverDiv(jsEvent, $('div#external-events')));
            $('.calendario').fullCalendar('removeEvents', event.id);
            borrarMensaje(event.id);
        }
    }
});
/*==========================================
=            imagen cambiar
            =
==========================================*/
function cambiar() {
    document.getElementById('eliminar').src = "img/trash-open.png";
}

function volver() {
    document.getElementById('eliminar').src = "img/trash.png";
}
/*=====  End of imagen cambiar
  ======*/