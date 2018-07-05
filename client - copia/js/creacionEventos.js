$(function() {
    var l = new Login();
    /*=======================================
    =            chequeo allDays            =
    =======================================*/
    $("#allDay").on("click", function() {
        if ($("#allDay:checked").val() == 'on') {
            $('#end_date').val($('#start_date').val())
            $('#start_hour').val('00:00')
            $('#end_hour').val('23:55')
        } else {
            $('#end_date').val('')
            $('#start_hour').val('')
            $('#end_hour').val('')
        };
    })
    /*=====  End of chequeo allDays  ======*/
});
/*=====================================================
=            cheque exclusivo para las hs             =
=====================================================*/
function controlFecha(inicio, fin) {
    if (inicio < fin) {
        return true
    } else {
        return false;
    }
}
/*=====  End of cheque exclusivo para las hs   ======*/
/*===============================================================
=            limpiando los datos luego del insert :)            =
===============================================================*/
function limpiezaDatos() {
    if ($("#allDay:checked").val() == 'on') {
        $('#allDay').prop('checked', false);
    }
    $('#titulo').val('')
    $('#start_date').val('')
    $('#start_hour').val('')
    $('#end_hour').val('')
    $('#end_date').val('')
}
/*=====  End of limpiando los datos luego del insert :)  ======*/
class Login {
    constructor() {
        this.submitEvent()
    }
    submitEvent() {
        $('form').submit((event) => {
            event.preventDefault()
            /*=============================================
            =            Chequeo dia y HS         =
            =============================================*/
            if ($('#start_date').val() < $('#end_date').val()) {
                this.sendForm()
            }
            if ($('#start_date').val() == $('#end_date').val()) {
                if (controlFecha($('#start_hour').val(), $('#end_hour').val())) {
                    this.sendForm()
                } else {
                    alert('Los  Horarios  son Incorrectos')
                }
            } else {
                alert('Procesando Informacion')
            }
            /*=====  End of Section comment block  ======*/
        })
    }
    sendForm() {
        let form_data = new FormData();
        form_data.append('titulo', $('#titulo').val())
        form_data.append('allDay', $('#allDay').val())
        form_data.append('start_date', $('#start_date').val())
        form_data.append('end_date', $('#end_date').val())
        form_data.append('start_hour', $('#start_hour').val())
        form_data.append('end_hour', $('#end_hour').val())
        $.ajax({
            url: '../server/create_eventos.php',
            dataType: "json",
            cache: false,
            processData: false,
            contentType: false,
            data: form_data,
            type: 'POST',
            success: function(php_response) {
                alert(php_response.msg);
                $('.calendario').fullCalendar('renderEvent', {
                    title: $('#titulo').val(),
                    start: $('#start_date').val() + 'T' + $('#start_hour').val(),
                    end: $('#end_date').val() + 'T' + $('#end_hour').val()
                });
                limpiezaDatos();
            },
            error: function() {
                alert("error en la comunicación con el servidor");
            }
        })
    }
}