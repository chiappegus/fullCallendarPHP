 function updateQuery(id, start, end) {
     console.log(id, start, end);
     var start = start.split("T");
     var end = end.split("T");
     let form_data = new FormData();
     form_data.append('id', id);
     form_data.append('start_date', start[0]);
     form_data.append('start_hour', start[1]);
     form_data.append('end_date', end[0]);
     form_data.append('end_hour', end[1]);
     $.ajax({
         url: '../server/update_event.php',
         dataType: "json",
         cache: false,
         processData: false,
         contentType: false,
         data: form_data,
         type: 'POST',
         success: function(php_response) {
             alert(php_response.msg);
         },
         error: function() {
             alert("error en la comunicación con el servidor");
         }
     })
 }